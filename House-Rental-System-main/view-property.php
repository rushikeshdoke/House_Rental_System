<?php 
session_start();
isset($_SESSION["email"]);

 ?>

<!DOCTYPE html>
<html>
<head>

   <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
   <style>
     #mapid { height: 140px; }
     
   </style>
</head>
<body>
 




<?php 
include('connect.php');
include('navbar.php');
include('review-engine.php');
include('booking-engine.php');
?>



<?php


	$property_id=$_GET['property_id'];
    $sql="SELECT * from add_property where property_id='$property_id'";
	$query=mysqli_query($conn,$sql);

	if(mysqli_num_rows($query)>0)
{
    while($rows=mysqli_fetch_assoc($query)){         



    $sql2="SELECT * FROM property_photo where property_id='$property_id'";
    $query2=mysqli_query($conn,$sql2);

    $rowcount=mysqli_num_rows($query2);
?>



<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
  <?php
  for($i=1;$i<=$rowcount;$i++)
  {
      $row=mysqli_fetch_array($query2);
      $photo=$row['p_photo']; 
  ?>

  <?php 
  if($i==1)
  {
  ?>
  <div class="item active">
  <img class="d-block img-fluid" src="data:image/jpeg;base64,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" alt="First slide" width="100%" style="max-height:600px; min-height:600px;">  
   
 </div>
  <?php 
  }
  else
  {
    ?> 
    <div class="item">
      <img class="d-block img-fluid" src="" alt="First slide" width="100%" style="max-height: 600px; min-height: 600px;">
    </div>

 <?php
   }
  }
  ?>

  </div>

  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<div class="col-sm-6">
  <center><h2><?php echo $rows['property_type'] ?></h2></center>
  <div class="row">
    <div class="col-sm-6">

      <div class="row">
      <div class="col-sm-6">
          <table>
            <tr>
              <td><h3>Country:</h3></td>
              <td><h4><?php echo $rows['country']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Province:</h3></td>
              <td><h4><?php echo $rows['province']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Zone:</h3></td>
              <td><h4><?php echo $rows['zone']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>District:</h3></td>
              <td><h4><?php echo $rows['district']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>City:</h3></td>
              <td><h4><?php echo $rows['city']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>VDC/Municipality:</h3></td>
              <td><h4><?php echo $rows['vdc_municipality']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Ward No.:</h3></td>
              <td><h4><?php echo $rows['ward_no']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Tole:</h3></td>
              <td><h4><?php echo $rows['tole']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Contact No.:</h3></td>
              <td><h4><?php echo $rows['contact_no']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Estimated Price:</h3></td>
              <td><h4>Rs.<?php echo $rows['estimated_price']; ?></h4></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <table>
            <tr>
              <td><h3>Total Rooms:</h3></td>
              <td><h4><?php echo $rows['total_rooms']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Bedrooms:</h3></td>
              <td><h4><?php echo $rows['bedroom']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Living Room:</h3></td>
              <td><h4><?php echo $rows['living_room']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Kitchen:</h3></td>
              <td><h4><?php echo $rows['kitchen']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Bathroom:</h3></td>
              <td><h4><?php echo $rows['bathroom']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Booked:</h3></td>
              <td><h4><?php echo $rows['booked']; ?></h4></td>
            </tr>
            <tr>
              <td><h3>Description:</h3></td>
              <td><h4><?php echo $rows['description']; ?></h4></td>
            </tr>            
          </table>
    </div>
  </div>  

</div>

</div>
<br>

<?php 

if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){

?>
<form method="POST">
<div class="row">
  <div class="col-sm-6">
    <?php
    $booked=$rows['property_id'];

    if ($booked=='No'){ ?>
      <input type="hidden" name="property_id" value="<?php echo $rows['property_id']; ?>">
    <input type="submit" class="btn btn-lg btn-primary" name="book_property" style="width: 100%" value="Book Property">
  <?php } else { ?>
    <input type="submit" class="btn btn-lg btn-primary" style="width: 100%" value="Property Booked" disabled>
  <?php } ?>
  </div>
</form>
<form method="POST" action="chatpage.php">
  <div class="col-sm-6">
    <input type="hidden" name="owner_id" value="<?php echo $rows['owner_id']; ?>">
    <input type="submit" class="btn btn-lg btn-success" name="send_message" style="width: 100%" value="Send Message" >

  </div>
  </form>
</div>

<?php }
else{
  echo "<center><h3>You should login to book property.</h3></center>";
}


 ?>

<br>
<div id="map" style="width: 100%; height: 300px;">
  <div id="lat"><?php echo  $rows['latitude'];?></div>
  <div id="lon"><?php echo  $rows['longitude'];?></div>
</div>  
<br>


<?php }} ?>
</div>


<div class="container-fluid">
  <h2>Review Property:</h2>
      <div class="well well-sm">
            <div class="text-right">
<?php 

if(isset($_SESSION["email"]) && !empty($_SESSION['email'])){
?>
                <a class="btn btn-success btn-info" href="#reviews-anchor" style="width: 100%" id="open-review-box">Leave a Review</a>
            </div>

            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" method="POST">
                      <input name="property_id" type="hidden" value="<?php echo $property_id; ?>">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>

                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                            <button class="btn btn-success btn-lg" type="submit" name="review">Save</button>
                        </div>
                    </form>
                </div>
                </div>
              <?php } 
              else{
                echo "<center>You should login to review property.</center>";
              }
              ?>


        </div> 

</div>


<?php

    $sql1="SELECT * from review where property_id='$property_id'";
  $query=mysqli_query($conn,$sql1);
    echo '<div class="container-fluid">';
    echo '<h3>Reviews:</h3>';
    echo '</div>';
  if(mysqli_num_rows($query)>0)

{
    while($row=mysqli_fetch_assoc($query)){
      ?>
      <div class="container-fluid">        
        <ul><li><?php echo $row['comment']; ?> &nbsp;&nbsp;&nbsp;(<span class="glyphicon glyphicon-star-empty" style="size: 50px;"><?php echo $row['rating']; ?></span>)</li></ul>
      </div>


      <?php
    }
  }     
 ?>
<br><br>




</body>
</html>
<script type="text/javascript">
function initialize() {
  var x=document.getElementById("lat").innerText ;
  var y=document.getElementById("lon").innerText ;
   var latlng = new google.maps.LatLng(x,y);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var infowindow = new google.maps.InfoWindow();   
    google.maps.event.addListener(marker, 'click', function() {
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title"><b>Location</b> : Noida</div></div>';
     
      infowindow.setContent(iwContent);
      
      infowindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
  h3 {
    font-size: 20px;
  }

  h4  {
    font-size: 20px;
  }

  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  text-align: left;
  padding: 1px;
}
</style>

<style>
   .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}
</style>

<script>
  (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();

  });

  $('.starrr').on('starrr:change', function(e, value){
    ratingsField.val(value);
  });
});
</script>