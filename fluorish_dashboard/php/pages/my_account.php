<div class="widget widget-2 widget-tabs widget-tabs-2 tabs-right border-bottom-none">
  <div class="widget-head">
    <ul>
      <li class="active"><a class="glyphicons user" href="#account-settings" data-toggle="tab"><i></i>User Profile</a></li>
      <li><a class="glyphicons barcode" href="#orders" data-toggle="tab"><i></i>Ordering Settings</a></li>
      <li><a class="glyphicons settings" href="#core-details" data-toggle="tab"><i></i>Core Information</a></li>
      <li><a class="glyphicons group" href="#core-members" data-toggle="tab"><i></i>Core Members</a></li>
      <!--<li><a class="glyphicons user" href="#lab-details" data-toggle="tab"><i></i>Lab Information</a></li>
      <li><a class="glyphicons settings" href="#lab-members" data-toggle="tab"><i></i>Lab Members</a></li>-->
    </ul>
  </div>
</div>
<div class="innerLR">
  <div class="tab-content"> 
    <!-- account-settings -->
    <div class="tab-pane active" id="account-settings">
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>User Profile</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
          <div class="row-fluid">
            <div class="span6">
              <div class="control-group">
                <label class="control-label"><?php echo $translate->_('first_name'); ?></label>
                <div class="controls">
                  <input type="text" value="John" class="span10" />
                  <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="First name is mandatory"><i></i></span> </div>
              </div>
              <div class="control-group">
                <label class="control-label"><?php echo $translate->_('last_name'); ?></label>
                <div class="controls">
                  <input type="text" value="Doe" class="span10" />
                  <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Last name is mandatory"><i></i></span> </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" value="royce.cano@edu.com" class="span10" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Institution</label>
                <div class="controls">
                  <input type="hidden" id="institutions"  value="Royce,Tree Star" />
                </div>
              </div>
            </div>
            <div class="span5">
              <label for="inputUsername">Username</label>
              <input type="text"  value="john.doe2012" class="span10" id="inputUsername">
              <!--<span data-original-title="Username can't be changed" data-placement="top" data-toggle="tooltip" class="btn-action single glyphicons circle_question_mark" style="margin: 0;"><i></i></span>-->
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
          </div>
          <div style="margin: 0;" class="form-actions">
            <button class="btn btn-icon btn-primary glyphicons circle_ok" type="submit"><i></i>Save changes</button>
            <button class="btn btn-icon btn-default glyphicons circle_remove" type="button"><i></i>Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- account-seetings end -->
    <div class="tab-pane" id="core-details"><!-- core-details tab --> 
      <!-- -->
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>Core Name</h4>
        </div>
        <div style="padding-bottom: 0;" class="widget-body">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-body">
                <input type="text" id="groupname" class="span12" placeholder="My Core Name" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- --> 
      <!-- -->
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>Core Access</h4>
        </div>
        <div style="padding-bottom: 0;" class="widget-body">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-body">
                <div class="uniformjs">
                  <label class="radio">
                    <input type="radio" class="radio" name="radio" value="1" />
                    Public </label>
                  <br/>
                  <label class="radio">
                    <input type="radio" class="radio" name="radio" value="1" checked="checked" />
                    Private </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- --> 
      <!-- -->
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>Contact Information</h4>
        </div>
        <div style="padding-bottom: 0;" class="widget-body">
          <div class="row-fluid">
            <div class="span6">
              <div class="widget-body">
                <h4>Contact Information</h4>
                <label for="inputPhone">Email</label>
                <div class="input-prepend"> <span class="add-on glyphicons envelope"><i></i></span>
                  <input type="text" id="inputPhone" class="input-large" placeholder="232 A Street" />
                </div>
                <label for="inputPhone"><?php echo $translate->_('phone'); ?></label>
                <div class="input-prepend"> <span class="add-on glyphicons phone"><i></i></span>
                  <input type="text" id="inputPhone" class="input-large" placeholder="01234567897" />
                </div>
                <label for="inputWebsite">Website</label>
                <div class="input-prepend"> <span class="add-on glyphicons link"><i></i></span>
                  <input type="text" id="inputWebsite" class="input-large" placeholder="Oregon" />
                </div>
              </div>
            </div>
            <div class="span6">
              <div class="widget-body">
                <h4>Address</h4>
                <!--<label for="inputPhone">Address</label>-->
                <div class="input-prepend"> <span class="add-on glyphicons phone"><i></i></span>
                  <input type="text" id="inputPhone" class="input-large" placeholder="Tree Star, Inc" />
                </div>
                <!--<label for="inputEmail">E-mail</label>-->
                <div class="input-prepend"> <span class="add-on glyphicons envelope"><i></i></span>
                  <input type="text" id="inputEmail" class="input-large" placeholder="Ashland Research Building" />
                </div>
                <!--<label for="inputWebsite">Website</label>-->
                <div class="input-prepend"> <span class="add-on glyphicons link"><i></i></span>
                  <input type="text" id="inputWebsite" class="input-large" placeholder="2nd Floor Loft, Room 201" />
                </div>
                <!--<label for="inputWebsite">Website</label>-->
                <div class="input-prepend"> <span class="add-on glyphicons link"><i></i></span>
                  <input type="text" id="inputWebsite" class="input-large" placeholder="304 A Street" />
                </div>
                <!--<label for="inputWebsite">Website</label>-->
                <div class="input-prepend"> <span class="add-on glyphicons link"><i></i></span>
                  <input type="text" id="inputWebsite" class="input-large" placeholder="Ashland, OR 97504" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- --> 
      <!-- -->
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>Additional Information</h4>
        </div>
        <div style="padding-bottom: 0;" class="widget-body">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-body">
                <textarea class="span12" id="groupname" placeholder="Additional Information"></textarea>
              </div>
            </div>
          </div>
          <div class="form-actions" style="margin: 0;">
            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Delete Core</button>
            <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
            <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Save</button>
          </div>
        </div>
      </div>
      <!-- -->
    </div>
    <div class="tab-pane" id="core-members"><!-- core-members tab --> 
      <!-- -->
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>Member Mangement</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
          <div class="row-fluid">
            <div class="span12">
              <h5>Pending Members</h5>
              <div class="widget-timeline">
                <ul class="list-timeline">
                  <li> <span class="date">2/4/13</span> <span class="glyphicons activity-icon user_add"><i></i></span><span class="glyphicons activity-icon user_remove"><i></i></span> <span class="ellipsis"><a href="">Mick Ostrat</a> requested access.</span>
                    <div class="clearfix"></div>
                  </li>
                  <li> <span class="date">2/1/12</span> <span class="glyphicons activity-icon user_add"><i></i></span><span class="glyphicons activity-icon user_remove"><i></i></span> <span class="ellipsis"><a href="">Adam Triester</a> requested access.</span>
                    <div class="clearfix"></div>
                  </li>
                  <li> <span class="date">4/4/12</span> <span class="glyphicons activity-icon user_add"><i></i></span><span class="glyphicons activity-icon user_remove"><i></i></span> <span class="ellipsis"><a href="">Cindy Tyran</a> requested access.</span>
                    <div class="clearfix"></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <h5>Current Members</h5>
              <div class="widget-timeline">
                <table class="table table-bordered table-condensed">
                  <thead>
                    <tr>
                      <th class="center">Name</th>
                      <th class="center">Email</th>
                      <th class="center">Manager Privileges</th>
                      <th class="center">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="center">Jasper Katz</td>
                      <td class="center">repsajkatz@yahoo.com</td>
                      <td class="center"><input type="checkbox" checked="unchecked" /></td>
                      <td class="center"><a href=""class="btn btn-small">Remove</a></td>
                    </tr>
                    <tr>
                      <td class="center">Royce Cano</td>
                      <td class="center">roycedcano@yahoo.com</td>
                      <td class="center"><input type="checkbox" checked="checked" /></td>
                      <td class="center"><a href=""class="btn btn-small">Remove</a></td>
                    </tr>
                    <tr>
                      <td class="center">Nick Ostrat</td>
                      <td class="center">nick@yahoo.com</td>
                      <td class="center"><input type="checkbox" checked="checked" /></td>
                      <td class="center"><a href=""class="btn btn-small">Remove</a></td>
                    </tr>
                  </tbody>
                </table>
                <div class="separator bottom"></div>
                <!--<ul class="list-timeline">
                    <li> <span class="date">2/4/13</span> <span class="glyphicons activity-icon user_remove"><i></i></span> <span class="ellipsis"><a href="">Royce Cano</a> is a user.</span>
                    <div class="pull-right"><input type="checkbox" checked="checked" /><a href=""class="btn">Remove</a></div>
                    <div class="clearfix"></div>
                  </li>
                    <li> <span class="date">2/1/12</span> <span class="glyphicons activity-icon user_remove"><i></i></span> <span class="ellipsis"><a href="">Jasper Katz</a> is a user.</span>
                    <div class="pull-right"><input type="checkbox" checked="checked" /></div>
                    <div class="clearfix"></div>
                  </li>
                    <li> <span class="date">4/4/12</span> <span class="glyphicons activity-icon user_remove"><i></i></span> <span class="ellipsis"><a href="">Mike Stadinksy</a> is a manager.</span>
                    <div class="pull-right"><input type="checkbox" checked="checked" /></div>
                    <div class="clearfix"></div>
                  </li>
                  </ul>--> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- --> 
      
    </div>
    <!-- core-members tab end --> 
    
    <!-- lab-details -->
    <div class="tab-pane" id="lab-details">
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>Lab Preferences</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-body">
                <ul class="activities">
                  <?php for($i=1;$i<=3;$i++): ?>
                  <li<?php if ($i == 1): ?> class="highlight"<?php endif; ?>> <span class="glyphicons activity-icon"><i></i></span> <a href="">New User</a> has joined your core (<a href="">userID #12<?php echo $i; ?></a>) </li>
                  <?php endfor; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- lab-details end --> 
    <!-- orders -->
    <div class="tab-pane" id="orders">
      <div class="widget widget-2">
        <div class="widget-head">
          <h4 class="heading glyphicons edit"><i></i>Orders</h4>
        </div>
        <div class="widget-body" style="padding-bottom: 0;">
          <div class="row-fluid">
            <div class="span12">
              <ul class="activities">
                <?php for($i=1;$i<=3;$i++): ?>
                <li<?php if ($i == 1): ?> class="highlight"<?php endif; ?>> <span class="glyphicons activity-icon "><i></i></span> <a href="">Researcher</a> has requested 10 items for experiment (<a href="">Research Project #RDW-330<?php echo $i; ?></a>) </li>
                <?php endfor; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- orders end --> 
  </div>
</div>
<br/>
