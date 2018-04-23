<div class="page-header">
    <h1>
        Store
    </h1>
    <p>
        {{ link_to("store/new", "Create store") }}
    </p>
</div>

{{ content() }}

{{ form("store/search", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldStoreId" class="col-sm-2 control-label">Store ID</label>
    <div class="col-sm-10">
        {{ text_field("store_id", "type" : "numeric", "class" : "form-control", "id" : "fieldStoreId") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldStoreName" class="col-sm-2 control-label">Store Name</label>
    <div class="col-sm-10">
        {{ text_field("store_name", "size" : 30, "class" : "form-control", "id" : "fieldStoreName") }}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Search', 'class': 'btn btn-default') }}
    </div>
</div>

</form>

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

                <th Colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for store in page.items %}
            <tr>
                <td>{{ store.store_id }}</td>
            <td>{{ store.store_name }}</td>
            <td>{{ store.store_address }}</td>
            <td>{{ store.store_telp }}</td>
            <td>{{ store.store_istagram }}</td>
            <td>{{ store.store_facebook }}</td>
            <td>{{ store.store_tagline }}</td>

                <td>{{ link_to("store/edit/"~store.store_id, "Edit") }}</td>
                <td>{{ link_to("store/delete/"~store.store_id, "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("store/search", "First") }}</li>
                <li>{{ link_to("store/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("store/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("store/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>


