<div class="box-generic"> 
  <!-- posts -->
  <div id="chats" class="portlet-body" style="display: block;">
    <div data-rail-visible1="1" data-always-visible="1" data-height="100%" class="scroller" style="overflow: hidden; width: auto; height: 100%">
      <div class="chat-form">
        <div class="span10 input-cont">
          <input type="text" placeholder="Type a message here..." class="m-wrap">
        </div>
        <div class="span2 pull-right">
        	<a class="btn" href="">Post</a>
        </div>
      </div>
      <ul class="chats">
        <li class="in"><img src="<?php echo getURL(); ?>img/photo.jpg" alt="" class="avatar">
          <div class="message"> <span class="arrow"></span> <a class="name" href="#">Royce Cano</a> <span class="datetime">at Jul 25, 2013 11:09</span> <span class="body"> Lab meeting today at 10 pm to discuss the t-cell research funding. </span> </div>
        </li>
        <li class="in"> <img src="<?php echo getURL(); ?>img/photo.jpg" alt="" class="avatar">
          <div class="message"> <span class="arrow"></span> <a class="name" href="#">Matt Swindel</a> <span class="datetime">at Jul 25, 2013 11:09</span> <span class="body"> We are out of coffee, please can we get some more. </span> </div>
        </li>
      </ul>
    </div>
  </div>
  <!-- end posts --> 
</div>
<script>
	jQuery(document).ready(function() {    
	   Posts.initChat();
	});
</script>