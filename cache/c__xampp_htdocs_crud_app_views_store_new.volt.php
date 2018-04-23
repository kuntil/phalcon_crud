<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?= $this->tag->linkTo(['store', 'Go Back']) ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Create store
    </h1>
</div>

<?= $this->getContent() ?>

<?= $this->tag->form(['store/create', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal']) ?>

<div class="form-group">
    <label for="fieldStoreName" class="col-sm-2 control-label">Store Of Name</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['store_name', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldStoreName']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldStoreAddress" class="col-sm-2 control-label">Store Of Address</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['store_address', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldStoreAddress']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldStoreTelp" class="col-sm-2 control-label">Store Of Telp</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['store_telp', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldStoreTelp']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldStoreIstagram" class="col-sm-2 control-label">Store Of Istagram</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['store_istagram', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldStoreIstagram']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldStoreFacebook" class="col-sm-2 control-label">Store Of Facebook</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['store_facebook', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldStoreFacebook']) ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldStoreTagline" class="col-sm-2 control-label">Store Of Tagline</label>
    <div class="col-sm-10">
        <?= $this->tag->textField(['store_tagline', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldStoreTagline']) ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= $this->tag->submitButton(['Save', 'class' => 'btn btn-default']) ?>
    </div>
</div>

</form>
