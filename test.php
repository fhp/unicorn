<?php

function autoload($className)
{
	$className = ltrim($className, '\\');
	$fileName  = "src/";
	if ($lastNsPos = strrpos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName  .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}
	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	
	/** @noinspection PhpIncludeInspection */
	require_once($fileName);
}
spl_autoload_register('autoload');

use Unicorn\Forms\Conditions\InputDiffer;
use Unicorn\Forms\Conditions\InputNotEmpty;
use Unicorn\Forms\CsrfProtectedForm;
use Unicorn\Forms\RadioInput;
use Unicorn\Forms\SearchForm;
use Unicorn\Forms\SelectInput;
use Unicorn\Forms\SubmitButton;
use Unicorn\Forms\TextInput;
use Unicorn\UI\Base\HtmlElement;
use Unicorn\UI\Bootstrap\Alert;
use Unicorn\UI\Bootstrap\Badge;
use Unicorn\UI\Bootstrap\BadgeCounter;
use Unicorn\UI\Bootstrap\BoolCheck;
use Unicorn\UI\Bootstrap\BootstrapHtmlPage;
use Unicorn\UI\Bootstrap\Breadcrumbs;
use Unicorn\UI\Bootstrap\Button;
use Unicorn\UI\Bootstrap\Collapsible;
use Unicorn\UI\Bootstrap\ContextualStyle;
use Unicorn\UI\Bootstrap\HtmlDebugger;
use Unicorn\UI\Bootstrap\Icons\TrueIcon;
use Unicorn\UI\Bootstrap\Label;
use Unicorn\UI\Bootstrap\LinkButton;
use Unicorn\UI\Bootstrap\Modal;
use Unicorn\UI\Bootstrap\ModalForm;
use Unicorn\UI\Bootstrap\Navbar;
use Unicorn\UI\Bootstrap\Navigation;
use Unicorn\UI\Bootstrap\NavigationItem;
use Unicorn\UI\Bootstrap\OrmTable;
use Unicorn\UI\Bootstrap\Panel;
use Unicorn\UI\Bootstrap\PanelTitle;
use Unicorn\UI\Bootstrap\Tab;
use Unicorn\UI\Bootstrap\Table;
use Unicorn\UI\Bootstrap\Tabs;
use Unicorn\UI\HTML\Header;
use Unicorn\UI\HTML\Image;
use Unicorn\UI\Bootstrap\LeadParagraph;
use Unicorn\UI\HTML\Link;
use Unicorn\UI\Bootstrap\Paragraph;
use Unicorn\UI\HTML\TableRow;

class TestForm extends CsrfProtectedForm
{
	/** @var TextInput */
	private $appel;
	
	/** @var TextInput */
	private $peer;
	
	/** @var RadioInput */
	private $radio;
	
	public function checkAccess(): bool
	{
		return true;
	}
	
	public function title(): string
	{
		return "Test form";
	}
	
	public function form(): void
	{
		$this->appel = new TextInput($this, "appel", "Appel");
		$this->appel->setDefaultValue("abc");
		$this->appel->required("Appels zijn belangrijk.");
		$this->addInput($this->appel);
		
		$this->peer = new TextInput($this, "peer", "Peer");
		$this->peer->setDefaultValue("123");
		$this->addInput($this->peer);
		
		$this->radio = new RadioInput($this, "radio", "Radio element");
		$this->radio->addOption("appel", "Appel");
		$this->radio->addOption("peer", "Peer");
		$this->radio->required("Maak een keuze.");
		$this->addInput($this->radio);
		
		$this->ensure(new InputDiffer($this->appel, $this->peer, "Appels niet met peren vergelijken."));
		
		$this->setSubmitButton(new SubmitButton($this, "submit", "Verstuur"));
	}
	
	public function handle(): void
	{
		// DB::nieuw($this->appel->value(), $this->peer->value());
	}
}

class TestPageLayout extends BootstrapHtmlPage
{
	function __construct()
	{
		$content = new HtmlElement("div");
		$content->addClass("container");
		
		parent::__construct($content);
		
		$navbar = new Navbar("navbar");
		$navbar->addText("Hallo");
		
		$navbar->addText("Hallo Henk", true);
		$button = new LinkButton("/logout", "logout");
		$navbar->addButton($button, true);
		
		$navbar->brandLink("Test Pagina");
		
		$navigation = new Navigation();
		$navigation->addClass("navbar-nav");
		
		$link1 = new Link("test.php");
		$link1->addText("Appel");
		$item = new NavigationItem($link1);
		$item->activate();
		$navigation->addItem($item);
		
		$link2 = new Link("test.php");
		$link2->addText("Peer");
		$navigation->addItem(new NavigationItem($link2));
		
		$navbar->addChild($navigation);
		
		$body = $this->body();
		$body->addChild($navbar);
		$body->addChild($content);
		
		$this->addStylesheet("test.css");
	}
	
	protected function setTitle(string $title): void
	{
		parent::setTitle("Test - " . $title);
	}
	
	protected function lipsum(): string
	{
		return file_get_contents("http://loripsum.net/api/1/plaintext");
	}
}

class TestPage extends TestPageLayout
{
	function __construct()
	{
		parent::__construct();
		
		$this->setTitle("appel");
		
		$this->addChild(new Header("Test page", "h1", "Alles over appels"));
		
		$this->addChild(new Alert("Let op!", "Dit is een belangrijke test", ContextualStyle::info()));
		
		$breadcrumbs = new Breadcrumbs("Test");
		$breadcrumbs->addBreadcrumb("appel", "appel.php");
		$this->addChild($breadcrumbs);
		
		$this->addChild($this->tabs());
	}
	
	private function tabs(): Tabs
	{
		$tabs = new Tabs();
		
		$tabs->addTab($this->formTab());
		$tabs->addTab($this->searchTab());
		$tabs->addTab($this->verhaalTab());
		$tabs->addTab($this->panelTab());
		$tabs->addTab($this->tableTab());
		$tabs->addTab($this->ormTableTab());
		$tabs->addTab($this->columnTableTab());
		
		return $tabs;
	}
	
	private function formTab()
	{
		$tab = new Tab("form", "Form");
		//$form = new TestForm("testForm", "test.php");
		
		//$modal = new ModalForm($form);
		
		//$tab->addChild(new HtmlDebugger("testForm-debug", $modal));
		//$tab->addChild($modal->toggleButton("Toon form"));
		
		return $tab;
	}
	
	private function searchTab()
	{
		$tab = new Tab("searchform", "Search Form");
//		$form = new SearchForm("searchForm", "test.php");
//
//		$tab->addChild(new HtmlDebugger("searchForm-debug", $form));
//
//		if($form->isActive() && $form->isSane()) {
//			$tab->addText("Zoekresultaten voor '" . $form->querty() . "'.");
//		}
		
		return $tab;
	}
	
	private function verhaalTab(): Tab
	{
		$tab = new Tab("verhaal", "Verhaal");
		
		$modal = new Modal("verhaalmodal");
		$modal->addCloseButton();
		$modal->setTitle("Verhaal");
		
		$tab->addChild($modal);
		$tab->addChild($modal->toggleButton("Toon verhaal"));
		
		$modal->addChild(new LeadParagraph($this->lipsum()));
		
		$collapse = new Collapsible("verhaaltje", "Lees meer", new TrueIcon);
		$p = new Paragraph();
		$img = new Image("http://lorempixel.com/400/200/");
		$img->addClass("pull-right");
		$p->addChild($img);
		$p->addText($this->lipsum());
		$collapse->addChild($p);
		$collapse->addChild(new Paragraph($this->lipsum()));
		$collapse->addChild(new Paragraph($this->lipsum()));
		$modal->addChild($collapse);
		
		return $tab;
	}
	
	private function panelTab(): Tab
	{
		$tab = new Tab("panel", "Panel");
		
		$panel = new Panel(ContextualStyle::success());
		$panel->header()->addChild(new PanelTitle("Badge, Label en Icon test panel"));
		
		$p = new Paragraph();
		$p->addChild(new Badge("test"));
		$p->addChild(new BadgeCounter(0));
		$p->addChild(new BadgeCounter(1));
		$p->addChild(new Label("Hallo", ContextualStyle::info()));
		$p->addChild(new BoolCheck(true));
		$p->addChild(new BoolCheck(false));
		$p->addChild(new Button("Test", new TrueIcon));
		$panel->body()->addChild($p);
		
		$table = new Table();
		$table->header()->addRow(TableRow::headerFromArray(["A", "B", "C"]));
		$table->body()->addRow(TableRow::fromArray(["1", "2", "3"]));
		$row = TableRow::fromArray(["4", "5", "6"]);
		$row->setStyle(ContextualStyle::success());
		$table->body()->addRow($row);
		$table->body()->addRow(TableRow::fromArray(["7", "8", "9"]));
		$panel->setTable($table);
		
		$panel->footer()->addText("En ook een spannende tabel");
		
		$tab->addChild($panel);
		
		return $tab;
	}
	
	private function tableTab(): Tab
	{
		$tab = new Tab("table", "Table");
		
		$table = new Table();
		$table->striped();
		
		$table->header()->fromArray(["Naam", "Leeftijd", "Woonplaats"]);
		$table->body()->fromArray([
			["Henk", "23", "Oss"],
			["Piet", "53", "Eindhoven"],
			["Klaas", "34", "Veldhoven"],
			["Bert", "47", "Waalre"],
		]);
		
		$tab->addChild($table);
		
		return $tab;
	}
	
	private function ormTableTab(): Tab
	{
		$tab = new Tab("ormTable", "ORM Table");
		
		$data = [
			["Henk", "23", "Oss"],
			["Piet", "53", "Eindhoven"],
			["Klaas", "34", "Veldhoven"],
			["Bert", "47", "Waalre"],
		];
		
		$table = new OrmTable($data);
		$table->striped();
		
		$table->addColumnFunction("Naam", function($element) { return $element[0]; });
		$table->addColumnFunction("Leeftijd", function($element) { return $element[1]; });
		$table->addColumnFunction("Woonplaats", function($element) { return $element[2]; });
		
		$tab->addChild($table);
		
		return $tab;
	}
	
	private function columnTableTab(): Tab
	{
		$tab = new Tab("coltable", "Kolommen tabel");
		
		$table = new Table();
		$table->hoverRows();
		$table->addColumn("Naam", ["Henk", "Piet", "Klaas", "Bert"]);
		$table->addColumn("Leeftijd", ["23", "53", "34", "47"]);
		
		$tab->addChild($table);
		
		return $tab;
	}
}

echo new TestPage();
