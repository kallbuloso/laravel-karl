<?php

namespace kallbuloso\Karl\Builder\LaraCrud\View;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use kallbuloso\Karl\Builder\LaraCrud\DbReader\Table;
use kallbuloso\Karl\Builder\LaraCrud\Helpers\TemplateManager;
use kallbuloso\Karl\Builder\LaraCrud\View\Partial\Form;
use kallbuloso\Karl\Builder\LaraCrud\View\Partial\Link;

class Edit extends Page
{
    /**
     * @var Form
     */
    protected $form;

    /**
     * Edit constructor.
     *
     * @param Model  $model
     * @param string $name
     */
    public function __construct(Model $model, $name = '')
    {
        $this->model = $model;
        $this->table = new Table($this->model->getTable());
        $this->setFolderName();
        $this->name = !empty($name) ? $name : config('karl.laracrud.view.page.edit.name');
        $this->form = new Form($this->model);

        parent::__construct();
    }

    /**
     * @return string
     */
    public function template()
    {
        $prefix = config('karl.laracrud.view.namespace') ? config('karl.laracrud.view.namespace') . '::' : '';
        $link = new Link($this->table->name());

        return (new TemplateManager("view/{$this->version}/pages/edit.html", [
            'layout' => config('karl.laracrud.view.layout'),
            'table' => $this->table->name(),
            'tableTitle' => $this->getTitleColumn(),
            'folder' => $prefix . $this->form->getFolder(),
            'routeModelKey' => $this->dataStore['routeModelKey'] ?? 'id',
            'partialFilename' => Str::singular($this->table->name()),
            'indexRoute' => $this->getRouteName('index', $this->table->name()),
            'createLink' => $link->create(get_class($this->model)),
            'showRoute' => $this->getRouteName('show', $this->table->name()),
            'updateRoute' => $this->getRouteName('update', $this->table->name()),
        ]))->get();
    }

    /**
     * @throws \Exception
     */
    public function save()
    {
        if (!$this->form->isExists()) {
            $this->form->save();
        }
        parent::save();
    }
}