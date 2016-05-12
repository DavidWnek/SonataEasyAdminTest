<?php

namespace GTX\SonataEasyAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AutoAdmin extends Admin
{
    /**
     * @var array
     */
    private $config;

    public function __construct($code, $class, $baseControllerName, $config)
    {
        $this->config = $config;
        parent::__construct($code, $class, $baseControllerName);
    }


    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $form)
    {
        $config = $this->config['edit'];

        if($config) {
            foreach($config['fields'] as $field) {
                $form->add($field['property'], array_key_exists('type', $field) ? $field['type'] : null, array_key_exists('type_options', $field) ? $field['type_options'] : null);
            }
            $actions = array();

            foreach($config['actions'] as $action) {
                $actions[$action] = array();
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $list)
    {
        $config = $this->config['list'];

        if($config) {
            foreach($config['fields'] as $field) {
                if(is_array($field)) {
                    $list->add($field['property'],
                        array_key_exists('type', $field) ? $field['type'] : null,
                        array_key_exists('type_options', $field) ? $field['type_options'] : null
                    );
                } else {
                    $list->add($field);
                }

            }
            $actions = array();

            foreach($config['actions'] as $action) {
                dump($action);
                if(is_array($action)) {
                    $actions = array_merge($actions, $action);
                } else {
                    $actions[$action] = array();
                }
            }

            dump($config['actions']);
            dump($actions);

            $list->add('_action', 'actions', array(
                'actions' => $actions,
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filter)
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $filter)
    {
    }


}