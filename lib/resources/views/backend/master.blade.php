<!DOCTYPE html>
<html lang="en">
    <head> 
        <base href="{{asset('public/dist')}}/">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')|Tuan tam</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/x-icon" href="favicon.png">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../editor/ckeditor/ckeditor.js"></script>
    </head>
    <body class="sb-nav-fixed">


        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{asset('admin/home')}}">Home</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->


            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <span style="color: #FF9600"> {{Auth::user()->email}}</span>
                    <a class="nav-link" href="{{asset('/admin/logout')}}">Thoát</a>
                </li>
            </ul>
        </nav>



        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="{{asset('admin/home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Trang chủ
                            </a>
                            <div class="sb-sidenav-menu-heading">Danh mục sản phẩm</div>
                            <a class="nav-link" href="{{asset('admin/category')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Danh Mục
                            </a>
                            <a class="nav-link" href="{{asset('admin/product')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Sản Phẩm
                            </a>
                            <div class="sb-sidenav-menu-heading">Phản Hồi Bên Khách Hàng</div>
                            <a class="nav-link" href="{{asset('admin/comment')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Phản Hồi Sản Phẩm
                            </a>
                            <a class="nav-link" href="{{asset('admin/follow')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Emaill Follow Pages
                            </a>
                             <a class="nav-link" href="{{asset('admin/contact')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Thông Tin Liên Hệ Của Khách
                            </a>
                            <div class="sb-sidenav-menu-heading">Tính Phí Và Mã Giảm Giá</div>
                            <a class="nav-link" href="{{asset('admin/coupon')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Mã Giảm Giá
                            </a>
                            <a class="nav-link" href="{{asset('admin/delivery')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Phí Vận Chuyển
                            </a>
                            <div class="sb-sidenav-menu-heading">Các Phần Hiển Thị</div>
                            <a class="nav-link" href="{{asset('admin/slidebar')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Quản Lý Quảng Cáo
                            </a>
                            <a class="nav-link" href="{{asset('admin/blog')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Quản Lý Blog
                            </a>
                            <a class="nav-link" href="{{asset('admin/brand')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Quản Lý Thương Hiệu
                            </a>
                            <a class="nav-link" href="{{asset('admin/order')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Quản Lý Don Hang
                            </a>
                            
                        </div>
                    </div>
                    
                </nav>
            </div>


@yield('main')


                        <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tâm đẹp trai</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
     
        <script src="js/jquery.unobtrusive-ajax.js"></script>
        <script src="js/jquery.unobtrusive-ajax.min.js"></script>
     
        <script src="js/scripts.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

        <script src="assets/demo/datatables-demo.js"></script>
        <script type="text/javascript">
$(document).ready(function() {    
$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});    
$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');
$('#products .item').addClass('grid-group-item');
});
});</script>
<script type="text/javascript">
    $(document).ready(function(){
        fetch_delivery();
        function fetch_delivery(){
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/admin/delivery/select-freeship')}}',
                method: 'POST',
                data: { _token:_token},
                success:function(data){
                    $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.free_ship_edit',function(){
            var fre_ship_id=$(this).data('freeship_id');
            var fre_ship_value=$(this).text();
            var _token=$('input[name="_token"]').val();
            // alert(fre_ship_id);
            // alert(fre_ship_value);
             $.ajax({
                url: '{{url('/admin/delivery/update-delivery')}}',
                method: 'POST',
                data: {fre_ship_id:fre_ship_id, fre_ship_value:fre_ship_value,_token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });

        });
        $('.add_delivery').click(function(){
            var city=$('.city').val();
            var province= $('.province').val();
            var wards= $('.wards').val();
            var fre_ship=$('.fre_ship').val();
            var _token=$('input[name="_token"]').val();
            // alert(city);
            // alert(province);
            // alert(wards);
            // alert(fre_ship);
             $.ajax({
                url: '{{url('/admin/delivery/insert-delivery')}}',
                method: 'POST',
                data: {city:city, province:province, _token:_token, wards:wards, fre_ship:fre_ship},
                success:function(data){
                    fetch_delivery();
                }
            });


       });

        $('.choose').on('change',function(){
            var action=$(this).attr('id');
            var ma_id=$(this).val();
            var _token=$('input[name="_token"]').val();
            var $result='';

            if(action=='city'){
                result='province';
            }else{
                result='wards';
            }
            $.ajax({
                url: '{{url('/admin/delivery/select-delivery')}}',
                method: 'POST',
                data: {action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })
</script>
        <script>
  $('#calendar').datepicker();

  !function ($) {
      $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
          $(this).find('em:first').toggleClass("glyphicon-minus");      
      }); 
      $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
  }(window.jQuery);

  $(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
  })
  $(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
  })
  // Chang Image add product
  function changeImg(input){
      //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
      if(input.files && input.files[0]){
          var reader = new FileReader();
          //Sự kiện file đã được load vào website
          reader.onload = function(e){
              //Thay đổi đường dẫn ảnh
              $('#anhSanPham').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $(document).ready(function() {
      $('#anhSanPham').click(function(){
          $('#img').click();
      });
  });
 </script>
 <script type="text/javascript">
     $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token=$('input[name="_token"]').val();
        quantity= [];
        $("input[name='order_quantity']").each(function(){
            quantity.push($(this).val());
        });
        order_product_id=[];
        $("input[name='order_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j=0;
        for(i=0;i<order_product_id.length;i++){
            // alert(order_product_id[i]);
            var order_qty=$('.order_quantity_'+order_product_id[i]).val();
            var order_qty_sto=$('.order_quantity_storage_'+order_product_id[i]).val();
            // alert(order_qty);
            // alert(order_qty_sto);
            if(parseInt(order_qty)>parseInt(order_qty_sto)){
                j=j+1;
                if(j==1){
                    alert('số lượng sản phẩm trong kho không đủ');
                }
                $('.color_quanity_'+order_product_id[i]).css('background','#807d6a');
            }

        }
        if(j==0){
        $.ajax({
                url: '{{url('/admin/order/update-order-qty')}}',
                method: 'POST',
                data: { _token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id},
                success:function(data){
                    alert('thay đổi trạng thái đơn hàng thành công');
                    location.reload();
                }
            });
        }
        // alert(quantity);
        // alert(order_product_id);
        // alert(order_status);
        // alert(order_id);
        // alert(_token);
     });
 </script>
 <script type="text/javascript">
     $( function(){
        $("#datepicker").datepicker({
            dateFormat:"yy-mm-dd",
            duration:"slow",

        });
        $("#datepicker2").datepicker({
            dateFormat:"yy-mm-dd",
            duration:"slow",
        });
     });
 </script>
 <script type="text/javascript">
     $(document).ready(function(){
      chart30daysorder();
      var chart =  new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  lineColors: ['#1a48f0','#1af03e','#f0891a','#731af0','#e3a3a3'],
  parseTime:false,
  hideHover:'auto',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  // data: [
  //   { year: '2008', value: 20 },
  //   { year: '2009', value: 10 },
  //   { year: '2010', value: 5 },
  //   { year: '2011', value: 5 },
  //   { year: '2012', value: 20 }
  // ],
  // The name of the data record attribute that contains x-values.
  xkey: 'period',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['order','sales','profit','quantity'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Đơn Hàng','Doanh Thu','Lợi Nhuận','Số Lượng']
});
        $('.dashboard-filter').change(function(){
          var dashboard_value=$(this).val();
          var _token=$('input[name="_token"]').val();
          $.ajax({
               url: '{{url('/admin/dashboard-filter')}}',
                method: 'POST',
                dataType:"JSON",
                data: { _token:_token,dashboard_value:dashboard_value},
                success:function(data){
                    chart.setData(data);
                }
          });
          // alert(dashboard_value);
        });
        function chart30daysorder(){
           var _token=$('input[name="_token"]').val();
           $.ajax({
               url: '{{url('/admin/days-order')}}',
                method: 'POST',
                dataType:"JSON",
                data: { _token:_token},
                success:function(data){
                    chart.setData(data);
                }
          });

        }
        $('#btn-dashboard-filter').click(function(){
            // alert('an dau bui');
             var _token=$('input[name="_token"]').val();
             var from_date=$('#datepicker').val();
             var to_date=$('#datepicker2').val();
             // alert(from_date);
             // alert(to_deate);
             $.ajax({
                url: '{{url('/admin/fiter-by-date')}}',
                method: 'POST',
                dataType:"JSON",
                data: { _token:_token,from_date:from_date,to_date:to_date},
                success:function(data){
                    chart.setData(data);
                }
             });
        });
     });
 </script>
 <script type="text/javascript">
     $('.update_quantity').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_quantity =$('.order_quantity_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token=$('input[name="_token"]').val();
        // var order_quantitys=$('.order_quantity_storage_'+order_product_id).val();
        // alert(order_quantitys);
        // alert(order_quantity);
        // alert(order_code);
         $.ajax({
                url: '{{url('/admin/order/update-quantity')}}',
                method: 'POST',
                data: {order_product_id:order_product_id, order_quantity:order_quantity,_token:_token,order_code:order_code},
                success:function(data){
                    alert('Cập Nhập Số Lượng Thành Công');
                    location.reload();
                }
            });


     });
 </script>
 <script type="text/javascript">
   $(document).ready(function(){

var colorDanger = "#FF1744";
Morris.Donut({
  element: 'donutt',
  resize: true,
  colors: [
    '#b434eb',
    '#00ACC1',
    '#93b32d',
    '#b3552d',
    '#006064'
  ],
  //labelColor:"#cccccc", // text color
  //backgroundColor: '#333333', // border color
  data: [
    {label:"Sản Phẩm", value:<?php echo $appproduct ?>},
    {label:"Tin Tức", value:<?php echo $appblog ?>},
    {label:"Tài Khoản", value:<?php echo $appcustomer ?>},
    {label:"Đơn Hàng", value:<?php echo $apporder ?>},
    {label:"Liên Hệ", value:<?php echo $appcontact ?>}
  ]
});

   })
 </script>


    </body>
</html>

 