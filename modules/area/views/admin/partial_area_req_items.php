<div id="jqxGridSkill"></div>
<script language="javascript" type="text/javascript">


    $(function(){

        var skillDataSource =
        {
            datatype: "json",
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'name', type: 'string' },
                { name: 'created_by', type: 'number' },
                { name: 'modified_by', type: 'number' },
                { name: 'created_date', type: 'date' },
                { name: 'modified_date', type: 'date' },
                { name: 'delete_flag', type: 'number' },

            ],
            url: '<?php echo site_url("admin/skill/json"); ?>',
            pagesize: defaultPageSize,
            root: 'rows',
            id : 'id',
            cache: true,
            pager: function (pagenum, pagesize, oldpagenum) {
                //callback called when a page or page size is changed.
            },
            beforeprocessing: function (data) {
                skillDataSource.totalrecords = data.total;
            },
            // update the grid and send a request to the server.
            filter: function () {
                $("#jqxGridSkill").jqxGrid('updatebounddata', 'filter');
            },
            // update the grid and send a request to the server.
            sort: function () {
                $("#jqxGridSkill").jqxGrid('updatebounddata', 'sort');
            },
            processdata: function(data) {
                filterscount = data.filterscount;
                if (data.filterscount > 0) {
                    for(i = 0; i< filterscount; i++  ) {
                        key = 'filterdatafield' + i;
                        val = 'filtervalue' + i;

                        //NOTE if DATE FIELD
                        //use following chunk of codes
                        //if (data[key] == 'FIELD_NAME') {
                        //    data[val] = Date.parse(data[val]).toString('yyyy-MM-dd');
                    }
                }
            }
        };

        var cellclassname = function (row, column, value, data) {

            if (data.delete_flag == '0')
                return 'status-active';
            else if (data.delete_flag == '1')
                return 'status-inactive';
        };

        $("#jqxGridSkill").jqxGrid({
            theme: theme_grid,
            width: '100%',
            height: gridHeight,
            source: skillDataSource,
            altrows: true,
            pageable: true,
            sortable: true,
            rowsheight: 30,
            columnsheight:30,
            showfilterrow: true,
            filterable: true,
            columnsresize: true,
            autoshowfiltericon: true,
            columnsreorder: true,
            selectionmode: 'none',
            virtualmode: true,
            enableanimations: false,
            pagesizeoptions: pagesizeoptions,
            columns: [
                { text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
                {
                    text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center',
                    cellsrenderer: function (index) {
                        var e = '', d='', row =  $("#jqxGridSkill").jqxGrid('getrowdata', index);
                        e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
                        if (row.delete_flag == 0) {
                            d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
                        } else {
                            d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
                        }

                        return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
                    }
                },
                { text: '<?php echo lang("name"); ?>',datafield: 'name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },

            ],
            rendergridrows: function (result) {
                return result.data;
            }
        });


        $("[data-toggle='offcanvas']").click(function(e) {
            e.preventDefault();
            $("#jqxGridSkill").jqxGrid('refresh');
        });

        $('#jqxGridSkillFilterClear').on('click', function () {
            $('#jqxGridSkill').jqxGrid('clearfilters');
        });

        $('#jqxGridSkillInsert').on('click', function(){
            openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
        });



    });

</script>