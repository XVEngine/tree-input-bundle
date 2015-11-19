(function (namespace, app, globals) {

    namespace.treeInputComponent = app.newClass({
        extend: function () {
            return app.core.component.input.abstractInputComponent;
        }
    });

    namespace.treeInputComponent.prototype.getTemplate = function () {
        var tmplString = app.utils.getString(function () {
            //@formatter:off
            /**<string>
             <xv-tree-input>
                    <label>
                        <span class="label"></span>
                    </label>
                    <div class="tree input">
                    </div>
             </xv-tree-input>
             </string>*/
            //@formatter:on
        });
        return $(tmplString);
    };

    namespace.treeInputComponent.prototype.getDefaultParams = function () {
        return {
            nodes : [],
            selectMode : 1,
            checkbox : false
        };
    };


    namespace.treeInputComponent.prototype.prepare = function () {
        this.$tree = this.$element.find(".tree");
        var self = this;
        this._options = {
            generateIds : true,
            onSelect: function(select, node) {

                self.onInput();
            }
        };


        this.setNodes(this.params.nodes);
        this.setCheckbox(this.params.checkbox);
        this.setSelectMode(this.params.selectMode);


        this.initEvents();
    };



    namespace.treeInputComponent.prototype.validators = {
    };





    namespace.treeInputComponent.prototype.setCheckbox = function (value) {
        this._options['checkbox'] = !!value;
        return this.refresh();
    };

    namespace.treeInputComponent.prototype.getCheckbox = function (value) {
        return this._options['checkbox'];
    };

    namespace.treeInputComponent.prototype.setSelectMode = function (mode) {
        this._options['selectMode'] = mode;
        return this.refresh();
    };


    namespace.treeInputComponent.prototype.getSelectMode = function () {
        return this._options['selectMode']
    };



    namespace.treeInputComponent.prototype.setNodes = function (nodes) {
        this._options['children'] = nodes;
        return this.refresh();
    };

    namespace.treeInputComponent.prototype.getNodes = function () {
        return this._options['children'];
    };



    namespace.treeInputComponent.prototype.refresh = function () {
        clearTimeout(this._timeOut);
        var self = this;
        this._timeOut = setTimeout(function(){
            self._refresh();
        }, 50);
        return this;
    };


    namespace.treeInputComponent.prototype._refresh = function () {
        this._treeInitialized && this.$tree.dynatree("destroy");

        this.$tree.dynatree(this._options);
        this._treeInitialized = true;

        var $el = this.$tree.find(".dynatree-folder > .dynatree-icon");
        $el.append("<i class='icon icon-folder'></i>");
        $el.append("<i class='icon icon-folder-open'></i>");
        return this;
    };


    namespace.treeInputComponent.prototype.initEvents = function () {

    };

    namespace.treeInputComponent.prototype.getValue = function () {
        var selected = [];
        this.$tree.dynatree("getRoot").visit(function(node){
            if(node.isSelected()){
                selected.push(node.data.key);
            }
        });

        return selected;
    };

    namespace.treeInputComponent.prototype.setValue = function (values) {
        if(!this._treeInitialized){
            var self = this;
            setTimeout(function(){
                self.setValue(values);
            }, 5);
            return this;
        }

        if(!app.utils.isArray(values))  values = [];

        for(var i = 0; i < values.length; i++){
            values[i] += "";
        }



        this.$tree.dynatree("getRoot").visit(function(node){
            node.select(values.indexOf(node.data.key) > -1);
        });

        return this;
    };

    return namespace.tickInputComponent;
})(__ARGUMENT_LIST__);