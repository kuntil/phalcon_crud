<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['store/index', 'Go Back']) ?></li>
            <li class="next"><?= $this->tag->linkTo(['store/new', 'Create ']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

<?= $this->getContent() ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Store</th>
            <th>Store Of Name</th>
            <th>Store Of Address</th>
            <th>Store Of Telp</th>
            <th>Store Of Istagram</th>
            <th>Store Of Facebook</th>
            <th>Store Of Tagline</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $store) { ?>
            <tr>
                <td><?= $store->store_id ?></td>
            <td><?= $store->store_name ?></td>
            <td><?= $store->store_address ?></td>
            <td><?= $store->store_telp ?></td>
            <td><?= $store->store_istagram ?></td>
            <td><?= $store->store_facebook ?></td>
            <td><?= $store->store_tagline ?></td>

                <td><?= $this->tag->linkTo(['store/edit/' . $store->store_id, 'Edit']) ?></td>
                <td><?= $this->tag->linkTo(['store/delete/' . $store->store_id, 'Delete']) ?></td>
            </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?= $page->current . '/' . $page->total_pages ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?= $this->tag->linkTo(['store/search', 'First']) ?></li>
                <li><?= $this->tag->linkTo(['store/search?page=' . $page->before, 'Previous']) ?></li>
                <li><?= $this->tag->linkTo(['store/search?page=' . $page->next, 'Next']) ?></li>
                <li><?= $this->tag->linkTo(['store/search?page=' . $page->last, 'Last']) ?></li>
            </ul>
        </nav>
    </div>
</div>
