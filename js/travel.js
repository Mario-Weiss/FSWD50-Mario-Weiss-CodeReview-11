
function fadeImage() {
    var x = 11; //number of images
    for (var i = 1; i <= x; ++i) {
        new Image().src = "img/bg" + i + ".jpg";
    }
    // caches images, avoiding white flash between background replacements
    var i = Math.ceil(Math.random() * x);
    document.getElementById("header").style.background = "url(img/bg" + i + ".jpg) no-repeat center center";
    document.getElementById("header").style.backgroundSize = "cover";
    setTimeout(function () { fadeImage(); }, 5000);
}
fadeImage();

var view = 'all';
var orderby = '';
var table = '';
var search = '';


function render(){
    $.ajax({
        url:"actions/a_read.php",
        method: "post",
        data:{render:1, table:view, 'orderby':orderby,'search':search},
        dataType:"text",
        success:function(data) {  
            $('#Locations').html(data);
        }
    });
}

function edit(table,id) {
    showLocation(table);
    $("#formdata").trigger("reset");
    $("#formTitle").html("Update location")
    $("#btn-submit").html("Save changes");
    $("#btn-submit").attr("onclick","update()");
    $("#table").hide();
    document.getElementById(table).checked = true;
    $.ajax({
        url:"actions/a_read.php",
        method: "post",
        data:{edit:1, 'table':table,'id':id},
        dataType:"text",
        success:function(data) {  
            data = $.parseJSON(data);
            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#adress").val(data.adress);
            $("#zip").val(data.zip);
            $("#city").val(data.city);
            $("#country").val(data.country);
            $("#image").val(data.image);
            $("#type").val(data.type);
            $("#short_desc").val(data.short_desc);
            $("#web").val(data.web);
            $("#table").val(data.table);
            if (table == 'restaurant') {
               $("#phone").val(data.phone); 
            }
            if (table == 'event') {
               $("#datetime").val(data.datetime); 
               $("#price").val(data.price); 
            }
        }
    });
}

function update() {
    var form = $('#formdata').serializeArray()
    $.ajax({
        url:"actions/a_update.php",
        method: "post",
        data: form,
        dataType: "text",
        success:function(data)

        {
            render();
        }
        }); 
}

function createNew() {
    showLocation('poi');
    $("#formdata").trigger("reset");
    $("#btn-submit").html("Create new");
    $("#formTitle").html("Create new location")
    $("#btn-submit").attr("onclick","create()");
    $("#table").show();
}

function create() {
    var form = $('#formdata').serializeArray()
    $.ajax({
        url:"actions/a_create.php",
        method: "post",
        data: form,
        dataType: "text",
        success:function(data)

        {
            render();
        }
        });
}

function deleteIt(table,id) {
    swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url:"actions/a_delete.php",
                        method: "post",
                        data: {'table':table,'id':id},
                        dataType: "text",
                        success:function(data)

                        {
                            render();
                        }
                        });
                } else {
                swal("Your data is safe!");
                }
                });
}

function showLocation(location) {
    $('.location').hide();
    $('.'+location).show();
}

function changeView(newview) {
    view = newview;
    render();
}

function sort(sorting) {
    orderby = 'ORDER BY '+sorting;
    render();

}

// get the value of checked box
$("input[name=table]").change(function(){
    var table = $("input[name=table]:checked").val();
    showLocation(table);
}); 

$('#search_text').keyup(function(){
    search = $(this).val();
    render()
});

render();