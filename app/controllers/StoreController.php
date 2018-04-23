<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class StoreController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
          $numberPage = 1;
        // if ($this->request->isPost()) {
        $query = Criteria::fromInput($this->di, 'Store', $_POST);
        $this->persistent->parameters = $query->getParams();
        // } else {
            // $numberPage = $this->request->getQuery("page", "int");
        // }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "store_id";

        $store = Store::find($parameters);
        if (count($store) == 0) {
            $this->flash->notice("The search did not find any store");

            $this->dispatcher->forward([
                "controller" => "store",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $store,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();   
    }

    /**
     * Searches for store
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Store', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "store_id";

        $store = Store::find($parameters);
        if (count($store) == 0) {
            $this->flash->notice("The search did not find any store");

            $this->dispatcher->forward([
                "controller" => "store",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $store,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a store
     *
     * @param string $store_id
     */
    public function editAction($store_id)
    {
        if (!$this->request->isPost()) {

            $store = Store::findFirstBystore_id($store_id);
            if (!$store) {
                $this->flash->error("store was not found");

                $this->dispatcher->forward([
                    'controller' => "store",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->store_id = $store->store_id;

            $this->tag->setDefault("store_id", $store->store_id);
            $this->tag->setDefault("store_name", $store->store_name);
            $this->tag->setDefault("store_address", $store->store_address);
            $this->tag->setDefault("store_telp", $store->store_telp);
            $this->tag->setDefault("store_istagram", $store->store_istagram);
            $this->tag->setDefault("store_facebook", $store->store_facebook);
            $this->tag->setDefault("store_tagline", $store->store_tagline);
            
        }
    }

    /**
     * Creates a new store
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "store",
                'action' => 'index'
            ]);

            return;
        }

        $store = new Store();
        $store->store_name = $this->request->getPost("store_name");
        $store->store_address = $this->request->getPost("store_address");
        $store->store_telp = $this->request->getPost("store_telp");
        $store->store_istagram = $this->request->getPost("store_istagram");
        $store->store_facebook = $this->request->getPost("store_facebook");
        $store->store_tagline = $this->request->getPost("store_tagline");
        

        if (!$store->save()) {
            foreach ($store->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "store",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("store was created successfully");

        $this->dispatcher->forward([
            'controller' => "store",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a store edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "store",
                'action' => 'index'
            ]);

            return;
        }

        $store_id = $this->request->getPost("store_id");
        $store = Store::findFirstBystore_id($store_id);

        if (!$store) {
            $this->flash->error("store does not exist " . $store_id);

            $this->dispatcher->forward([
                'controller' => "store",
                'action' => 'index'
            ]);

            return;
        }

        $store->store_name = $this->request->getPost("store_name");
        $store->store_address = $this->request->getPost("store_address");
        $store->store_telp = $this->request->getPost("store_telp");
        $store->store_istagram = $this->request->getPost("store_istagram");
        $store->store_facebook = $this->request->getPost("store_facebook");
        $store->store_tagline = $this->request->getPost("store_tagline");
        
        

        if (!$store->save()) {

            foreach ($store->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "store",
                'action' => 'edit',
                'params' => [$store->store_id]
            ]);

            return;
        }

        $this->flash->success("store was updated successfully");

        $this->dispatcher->forward([
            'controller' => "store",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a store
     *
     * @param string $store_id
     */
    public function deleteAction($store_id)
    {
        $store = Store::findFirstBystore_id($store_id);
        if (!$store) {
            $this->flash->error("store was not found");

            $this->dispatcher->forward([
                'controller' => "store",
                'action' => 'index'
            ]);

            return;
        }

        if (!$store->delete()) {

            foreach ($store->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "store",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("store was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "store",
            'action' => "index"
        ]);
    }

}
