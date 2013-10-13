<div id="prefrences" class="tab-pane widget-body-regular">
  <div class="widget widget-tabs widget-tabs-vertical row-fluid row-merge margin-none"> 
    
    <!-- Widget heading -->
    <div class="widget-head span3">
      <ul>
        <li class="active"><a data-toggle="tab" href="#account-details" class="glyphicons pencil"><i></i>Account details</a></li>
        <li class=""><a data-toggle="tab" href="#account-settings" class="glyphicons settings"><i></i>Account settings</a></li>
        <li class=""><a data-toggle="tab" href="#privacy-settings" class="glyphicons eye_open"><i></i>Privacy settings</a></li>
      </ul>
    </div>
    <!-- // Widget heading END -->
    
    <div class="widget-body span9">
      <div class="tab-content">
        <div id="account-details" class="tab-pane active"> 
          
          <!-- Row -->
          <div class="row-fluid"> 
            
            <!-- Column -->
            <div class="span6">
              <label>Core Manager</label>
              <input type="text" class="span10" value="">
              <span data-original-title="A Manager is mandatory" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
              <div class="separator bottom"></div>
              <label>Core Name</label>
              <input type="text" class="span10" value="UCSF">
              <span data-original-title="Core name is mandatory" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
              <div class="separator bottom"></div>
            </div>
            <!-- // Column END --> 
            
            <!-- Column -->
            <div class="span6">
              <label>Phone</label>
              <input type="text" class="span10" value="(555)456-1235">
              <span data-original-title="Phone is mandatory" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
              <div class="separator bottom"></div>
              <label>Institution</label>
              <select class="span12">
                <option>UCSF</option>
                <option>UCDFD</option>
              </select>
              <div class="separator bottom"></div>
            </div>
            <!-- // Column END --> 
            
          </div>
          <!-- // Row END -->
          
          <div class="separator"></div>
          <label>Core Information</label>
          <ul style="" class="wysihtml5-toolbar" id="mustHaveId-wysihtml5-toolbar">
            <li class="dropdown"><a href="core.html#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="icon-font icon-white"></i>&nbsp;<span class="current-font">Normal text</span>&nbsp;<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal text</a></li>
                <li><a data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 1</a></li>
                <li><a data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 2</a></li>
              </ul>
            </li>
            <li>
              <div class="btn-group"><a title="CTRL+B" data-wysihtml5-command="bold" class="btn btn-primary" href="javascript:;" unselectable="on">Bold</a><a title="CTRL+I" data-wysihtml5-command="italic" class="btn btn-primary" href="javascript:;" unselectable="on">Italic</a></div>
            </li>
            <li>
              <div class="btn-group"><a title="Unordered List" data-wysihtml5-command="insertUnorderedList" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-list icon-white"></i></a><a title="Ordered List" data-wysihtml5-command="insertOrderedList" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-th-list icon-white"></i></a><a title="Outdent" data-wysihtml5-command="Outdent" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-indent-right icon-white"></i></a><a title="Indent" data-wysihtml5-command="Indent" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-indent-left icon-white"></i></a></div>
            </li>
            <li>
              <div class="bootstrap-wysihtml5-insert-link-modal modal hide fade">
                <div class="modal-header"><a data-dismiss="modal" class="close">×</a>
                  <h3>Insert Link</h3>
                </div>
                <div class="modal-body">
                  <input class="bootstrap-wysihtml5-insert-link-url input-xlarge" value="http://">
                </div>
                <div class="modal-footer"><a data-dismiss="modal" class="btn" href="core.html#">Cancel</a><a data-dismiss="modal" class="btn btn-primary" href="core.html#">Insert link</a></div>
              </div>
              <a title="Link" data-wysihtml5-command="createLink" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-share icon-white"></i></a></li>
            <li>
              <div class="bootstrap-wysihtml5-insert-image-modal modal hide fade">
                <div class="modal-header"><a data-dismiss="modal" class="close">×</a>
                  <h3>Insert Image</h3>
                </div>
                <div class="modal-body">
                  <input class="bootstrap-wysihtml5-insert-image-url input-xlarge" value="http://">
                </div>
                <div class="modal-footer"><a data-dismiss="modal" class="btn" href="core.html#">Cancel</a><a data-dismiss="modal" class="btn btn-primary" href="core.html#">Insert image</a></div>
              </div>
              <a title="Insert image" data-wysihtml5-command="insertImage" class="btn btn-primary" href="javascript:;" unselectable="on"><i class="icon-picture icon-white"></i></a></li>
          </ul>
          <ul id="mustHaveId-wysihtml5-toolbar" class="wysihtml5-toolbar" style="display:none">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="icon-font icon-white"></i>&nbsp;<span class="current-font">Normal text</span>&nbsp;<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a data-wysihtml5-command-value="div" data-wysihtml5-command="formatBlock">Normal text</a></li>
                <li><a data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock">Heading 1</a></li>
                <li><a data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock">Heading 2</a></li>
              </ul>
            </li>
            <li>
              <div class="btn-group"><a title="CTRL+B" data-wysihtml5-command="bold" class="btn btn-primary">Bold</a><a title="CTRL+I" data-wysihtml5-command="italic" class="btn btn-primary">Italic</a></div>
            </li>
            <li>
              <div class="btn-group"><a title="Unordered List" data-wysihtml5-command="insertUnorderedList" class="btn btn-primary"><i class="icon-list icon-white"></i></a><a title="Ordered List" data-wysihtml5-command="insertOrderedList" class="btn btn-primary"><i class="icon-th-list icon-white"></i></a><a title="Outdent" data-wysihtml5-command="Outdent" class="btn btn-primary"><i class="icon-indent-right icon-white"></i></a><a title="Indent" data-wysihtml5-command="Indent" class="btn btn-primary"><i class="icon-indent-left icon-white"></i></a></div>
            </li>
            <li>
              <div class="bootstrap-wysihtml5-insert-link-modal modal hide fade">
                <div class="modal-header"><a data-dismiss="modal" class="close">×</a>
                  <h3>Insert Link</h3>
                </div>
                <div class="modal-body">
                  <input class="bootstrap-wysihtml5-insert-link-url input-xlarge" value="http://">
                </div>
                <div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Cancel</a><a data-dismiss="modal" class="btn btn-primary" href="#">Insert link</a></div>
              </div>
              <a title="Link" data-wysihtml5-command="createLink" class="btn btn-primary"><i class="icon-share icon-white"></i></a></li>
            <li>
              <div class="bootstrap-wysihtml5-insert-image-modal modal hide fade">
                <div class="modal-header"><a data-dismiss="modal" class="close">×</a>
                  <h3>Insert Image</h3>
                </div>
                <div class="modal-body">
                  <input class="bootstrap-wysihtml5-insert-image-url input-xlarge" value="http://">
                </div>
                <div class="modal-footer"><a data-dismiss="modal" class="btn" href="#">Cancel</a><a data-dismiss="modal" class="btn btn-primary" href="#">Insert image</a></div>
              </div>
              <a title="Insert image" data-wysihtml5-command="insertImage" class="btn btn-primary"><i class="icon-picture icon-white"></i></a></li>
          </ul>
          <textarea rows="5" class="wysihtml5 span12" id="mustHaveId" style="display: none;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.</textarea>
          <input type="hidden" name="_wysihtml5_mode" value="1">
          <iframe width="0" height="0" frameborder="0" class="wysihtml5-sandbox" security="restricted" allowtransparency="true" marginwidth="0" marginheight="0" style="background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(216, 217, 218); border-style: solid; border-width: 1px; clear: none; display: inline-block; float: none; margin: 0px; outline: 0px none rgb(167, 167, 167); outline-offset: 0px; padding: 4px 6px; position: static; z-index: auto; vertical-align: middle; text-align: start; -moz-box-sizing: border-box; box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.075) inset; border-radius: 0px 0px 0px 0px; width: 100%; height: 120px; top: auto; left: auto; right: auto; bottom: auto;"></iframe>
          <input type="hidden" value="1" name="_wysihtml5_mode">
          <iframe width="0" height="0" frameborder="0" marginheight="0" marginwidth="0" allowtransparency="true" security="restricted" class="wysihtml5-sandbox"></iframe>
          <div class="separator bottom"></div>
          <button class="btn btn-icon btn-primary glyphicons circle_ok" type="submit"><i></i>Save changes</button>
          <button class="btn btn-icon btn-default glyphicons circle_remove" type="button"><i></i>Cancel</button>
        </div>
        <div id="account-settings" class="tab-pane"> 
          
          <!-- Row -->
          <div class="row-fluid"> 
            
            <!-- Column -->
            <div class="span3"> <strong>Change password</strong>
              <p class="muted"></p>
            </div>
            <!-- // Column END --> 
            
            <!-- Column -->
            <div class="span9">
              <label for="inputUsername">Asign New Manager</label>
              <select class="span10">
                <option>Michelle Givens</option>
                <option>Jasper Katsz</option>
              </select>
              <span data-original-title="Username can't be changed" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
              <div class="separator"></div>
              <label for="inputUsername">Username</label>
              <input type="text" disabled="disabled" value="john.doe2012" class="span10" id="inputUsername">
              <span data-original-title="Username can't be changed" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
              <div class="separator"></div>
              <label for="inputPasswordOld">Old password</label>
              <input type="password" placeholder="Leave empty for no change" value="" class="span10" id="inputPasswordOld">
              <span data-original-title="Leave empty if you don't wish to change the password" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>
              <div class="separator"></div>
              <label for="inputPasswordNew">New password</label>
              <input type="password" placeholder="Leave empty for no change" value="" class="span12" id="inputPasswordNew">
              <div class="separator"></div>
              <label for="inputPasswordNew2">Repeat new password</label>
              <input type="password" placeholder="Leave empty for no change" value="" class="span12" id="inputPasswordNew2">
              <div class="separator"></div>
            </div>
            <!-- // Column END --> 
            
          </div>
          <!-- // Row END -->
          
          <div class="separator line bottom"></div>
          
          <!-- Row -->
          <div class="row-fluid"> 
            
            <!-- Column -->
            <div class="span3"> <strong>Contact details</strong>
              <p class="muted"></p>
            </div>
            <!-- // Column END --> 
            
            <!-- Column -->
            <div class="span9">
              <label for="inputPhone">Phone</label>
              <div class="input-prepend"> <span class="add-on glyphicons phone"><i></i></span>
                <input type="text" placeholder="" class="input-large" id="inputPhone">
              </div>
              <div class="separator"></div>
              <label for="inputEmail">E-mail</label>
              <div class="input-prepend"> <span class="add-on glyphicons envelope"><i></i></span>
                <input type="text" placeholder="" class="input-large" id="inputEmail">
              </div>
              <div class="separator"></div>
              <label for="inputWebsite">Website</label>
              <div class="input-prepend"> <span class="add-on glyphicons link"><i></i></span>
                <input type="text" placeholder="" class="input-large" id="inputWebsite">
              </div>
              <div class="separator"></div>
            </div>
            <!-- // Column END --> 
            
          </div>
          <!-- // Row END -->
          
          <div class="right">
            <button class="btn btn-icon btn-primary glyphicons circle_ok" type="submit"><i></i>Save changes</button>
          </div>
        </div>
        <div id="privacy-settings" class="tab-pane">
          <div class="uniformjs">
            <label class="checkbox">
            <div id="uniform-undefined" class="checker"><span class="checked">
              <div class="checker" id="uniform-undefined"><span class="checked">
                <input type="checkbox" style="opacity: 0; " checked="checked">
                </span></div>
              </span></div>
            Make This Core Private
            </label>
            <label class="checkbox">
            <div id="uniform-undefined" class="checker"><span>
              <div class="checker" id="uniform-undefined"><span>
                <input type="checkbox" style="opacity: 0; ">
                </span></div>
              </span></div>
            Only users with an EDU email can request access.
            </label>
            <label class="checkbox">
            <div id="uniform-undefined" class="checker"><span>
              <div class="checker" id="uniform-undefined"><span>
                <input type="checkbox" style="opacity: 0; ">
                </span></div>
              </span></div>
            Do not list this Core in the Fluorish Directory
            </label>
            <div class="alert alert-primary"> <a data-dismiss="alert" class="close">×</a>
              <p>
                <center>
                  Privacy settings have been updated.
                </center>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- // Tab content END --> 