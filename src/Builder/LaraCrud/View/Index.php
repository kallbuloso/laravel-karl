<?php

namespace kallbuloso\Karl\Builder\LaraCrud\View;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use kallbuloso\Karl\Builder\LaraCrud\DbReader\Table;
use kallbuloso\Karl\Builder\LaraCrud\Helpers\TemplateManager;
use kallbuloso\Karl\Builder\LaraCrud\View\Partial\Link;
use kallbuloso\Karl\Builder\LaraCrud\View\Partial\Panel;
use kallbuloso\Karl\Builder\LaraCrud\View\Partial\Table as TableView;

/**
 * Tuhin Bepari <digitaldreams40@gmail.com>.
 */
class Index extends Page
{
    protected $tableView;
    protected $panel;

    public function __construct(Model $model, $name = '', $type = '')
    {
        $this->model = $model;
        $this->table = new Table($this->model->getTable());
        $this->setFolderName();
        $this->name = !empty($name) ? $name : config('karl.laracrud.view.page.index.name');
        $this->type = !empty($type) ? $type : config('karl.laracrud.view.page.index.type');
        $this->tableView = new TableView($this->model);
        $this->panel = new Panel($this->model);
        parent::__construct();
    }

    public function template()
    {
        $file = '';
        $prefix = config('karl.laracrud.view.namespace') ? config('karl.laracrud.view.namespace') . '::' : '';
        $folder = 3 == $this->version ? 'panels' : 'cards';
        $link = new Link($this->table->name());
        $data = [
            'table' => $this->table->name(),
            'layout' => config('karl.laracrud.view.layout'),
            'folder' => $prefix . $folder,
            'routeModelKey' => $this->model->getRouteKeyName(),
            'searchBox' => '',
            'partialFilename' => Str::singular($this->table->name()),
            'createLink' => $link->create(get_class($this->model)),
        ];
        switch ($this->type) {
            case 'panel':
                $this->panel();
                $file = "view/{$this->version}/pages/index_panel.html";
                break;
            case 'table':
                $this->tableView();
                $file = "view/{$this->version}/pages/index.html";
                break;
            default:
                $this->tableView();
                $file = "view/{$this->version}/pages/index.html";
                break;
        }
        $tempMan = new TemplateManager($file, $data);

        return $tempMan->get();
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function tableView()
    {
        if (!$this->tableView->isExists()) {
            return $this->tableView->save();
        }
    }

    protected function panel()
    {
        if (!$this->panel->isExists()) {
            return $this->panel->save();
        }
    }

    protected function searchBox()
    {
        return '';
    }

    public function save()
    {
        parent::save(); // TODO: Change the autogenerated stub
    }
}
