@section('script')
<script type="text/javascript">

    $('#AddToDo').click(function(){
        var data_post = $('#ToDo').val();
        var total_todo = parseInt($('#TotalToDo').val());
        var max_todo = parseInt($('#MaxToDo').val());

        if (data_post != '') {
            total_todo = parseInt(total_todo+1);
            max_todo = parseInt(max_todo+1);
            $('#ToDoResult').append(`
                <div class="checkbox" id="List_`+max_todo+`">
                    <label><input class="list_todo" index="`+max_todo+`" type="checkbox" value="">`+data_post+`<button class="btn btn-danger btn-sm delete_todo" id="Delete_`+max_todo+`" index="`+total_todo+`">Delete</button></label>
                </div>
            `);
            $('#TotalToDo').val(total_todo);
            $('#MaxToDo').val(max_todo);
        }
    });

    $('#ToDoResult').on('click', '.delete_todo', function(){
        var index = $(this).attr('index');
        var total_todo = parseInt($('#TotalToDo').val());
        var total_check = parseInt($('#CheckedTotalToDo').val());

        $('#TotalToDo').val(parseInt(total_todo-1));

        if ($('#List_'+index).attr('check') == 'true') {
            $('#CheckedTotalToDo').val(parseInt(total_check-1));    
        }

        $('#List_'+index).hide();
    });

    $('#DeleteAll').click(function(){
        $('.total').val(0);
        $('#ToDoResult').html('');
    })

    $('#ToDoResult').on('change', '.list_todo', function(){

        var index = $(this).attr('index');
        var total_todo = parseInt($('#TotalToDo').val());
        var total_check = parseInt($('#CheckedTotalToDo').val());
        
        if ($(this).is(':checked')) {
            $('#List_'+index).attr('check',true);
            $('#CheckedTotalToDo').val(parseInt(total_check+1));
        } else {
            $('#List_'+index).attr('check',false);
            $('#CheckedTotalToDo').val(parseInt(total_check-1));
        }
    });

    $('#DeleteSelected').click(function(){

        var total_todo = parseInt($('#TotalToDo').val());
        var total_check = parseInt($('#CheckedTotalToDo').val());
        
        $('#TotalToDo').val(parseInt(total_todo-total_check));

        $(".list_todo").each(function(){
            var index = $(this).attr('index');
            if ($('#List_'+index).attr('check') == 'true') {
                $('#List_'+index).hide();
            }
        });

        $('#CheckedTotalToDo').val(0);
    })

</script>
@stop

<div class="col-sm-12">
    <div class="col-sm-4">
        <br>
        <form>
            <div class="input-group">
                <input type="text" id="ToDo" class="form-control" placeholder="Type in a new to do...">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="button" id="AddToDo">
                        Add
                    </button>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
        <hr>
        <label for="">List To Do : </label>
        <button class="btn btn-primary btn-sm" id="DeleteSelected">Delete Selected</button>
        <button class="btn btn-danger btn-sm" id="DeleteAll">Delete All</button>
        <input type="text" class="total" id="TotalToDo" value="0" hidden>
        <input type="text" class="total" id="CheckedTotalToDo" value="0" hidden>
        <input type="text" id="MaxToDo" value="0" hidden>
        <div id="ToDoResult"></div>
    </div>
</div>