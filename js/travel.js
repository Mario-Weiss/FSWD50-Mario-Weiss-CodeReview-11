//---prepare images---//
//---input all images to the bg_images array and store the in the img/course_space folder---//
var bg_images = ["bg1.jpg","bg2.jpg","bg3.jpg","bg4.jpg","bg5.jpg","bg6.jpg","bg7.jpg","bg8.jpg","bg9.jpg","bg10.jpg","bg11.jpg"]

var images = []
var x = bg_images.length; //number of images
//---precaching images starts here---//
for (let i = 0; i < x; ++i) {
    images[i] = new Image()
    images[i].src = "img/" + bg_images[i];
}
// caches images, avoiding white flash between background replacements
//---function to change background image when it is called---//
function fadeImage(i) {
    if (i >= x) {i = 0};
    document.getElementById("header").style.background = "url(img/" + bg_images[i] + ") no-repeat center center";
    document.getElementById("header").style.backgroundSize = "cover";
    //document.getElementById("header").style.backgroundAttachment = "fixed";
    setTimeout(function () { fadeImage(i+1); }, 8000); // recalls function every 8 seconds
    //---for random image view use: setTimeout(function () { fadeImage(Math.round(Math.random() * x)); }, 5000);
}
//---initially call function---//
fadeImage(0);

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
               $("#datetime").val(data.datetime.replace(" ","T")); 
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
                .then((willDelete)=>{
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

function details(table,id) {
    showLocation(table);
    $.ajax({
        url:"actions/a_read.php",
        method: "post",
        data:{details:1, 'table':table,'id':id},
        dataType:"text",
        success:function(data) {  
            data = $.parseJSON(data);
            $("#detailsTitle").html(data.name);
            $("#details_name").html(data.name);
            $("#details_adress").html(data.adress+", "+data.zip+" "+data.city+" - "+data.country+" <a href='https://www.google.com/maps/place/"+data.zip+" "+data.city+", "+data.adress+"' title='show location on google maps'><i class='fas fa-map-marker-alt'></i></a>")
            $("#details_image").attr("src", "img/"+data.image);
            $("#details_type").html(data.type);
            $("#details_short_desc").html(unescape(data.short_desc));
            $("#details_web").html('<a href="'+data.web+'">'+data.web+'</a>');
            if (table == 'poi') {
                data.table = 'Point of Interest';
            }
            if (table == 'restaurant') {
                data.table = 'Restaurant';
                $("#details_phone").html(data.phone); 
            }
            if (table == 'event') {
                data.table = 'Event';
                $("#details_datetime").html(data.datetime); 
                $("#details_price").html('&euro; '+Number(data.price).toFixed(2)); 
            }
            $("#details_table").html(data.table);
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

function like(table,id,user) {
    $.ajax({
        url:"actions/a_like.php",
        method: "post",
        data:{check:1, 'table':table,'id':id,'user':user},
        dataType:"text",
        success:function(data) {
            if (data == 'true') {
                swal("You already like this!", "", "info");
            }   else {
                render();
            }
        }
    })
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