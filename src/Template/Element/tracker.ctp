<div class="">
   <div class="priceInquery">
      <div class="block">
         <div class="placeDatial">
            <div class="block">
               <div class="col">
                  <div class="datescol">
                     <input type="text" class="datespicker datepicker tripdate"   />   
                     <span id="dp"></span>
                  </div>
               </div>
               <div class="col">
                  <input type="text" name="country" placeholder="Country"   class="pop-o cuntFild srequire trackercountry trc" data-id="cuntFild" country-id="" readonly="readonly" />
                  <?php echo $this->Form->hidden('country_id',['id' => 'country_id']); ?>
                  <div class="chouseCurrnce" id="cuntFild">
                     <div class="searchCurr">
                        <input type="text" placeholder="Search Country" class="countrysearch">
                     </div>
                     <?php echo $this->cell('Inbox::country_list'); ?>
                  </div>
               </div>
               <div class="col">
                  <input type="text" placeholder="Place" class="place"/>
               </div>
            </div>
            <div class="addTrip"><a href="javascript:void(0);" onClick="tripPopup();"><img src="<?php echo WEBSITE_URL ; ?>images/ic7.png" alt="img" /></a></div>
         </div>
         <div class="category">
            <?php echo $this->cell('Inbox::tracker_category_list'); ?>
            <div class="fulldetails-pagedetail1">
               <p class="ppp-top"> 25</p>
               <p  class="ppp-top">14 </p>
               <p  class="ppp-top">20 </p>
               <p  class="ppp-top">7 </p>
               <p  class="ppp-top">12 </p>
            </div>
         </div>
      </div>
      <div class="small-mid-box Accom">
         <h6>Accom</h6>
         <div class="accom-info">
            <p><input id="" class="notlogin" placeholder="Title" type="text"></p>
         </div>
         <div class="accom-info">
            <p><input id="" class="notlogin" placeholder="Cost Currency" type="text"></p>
         </div>
         <div class="accom-info">
            <p><input id="" class="notlogin" placeholder="Details" type="text"></p>
         </div>
    <div class="block">
				<input class="btn radiusBtn1 signupSubmit" data-rel="signup-form" value="Ok" type="submit">
			 </div>
        
         <div class="accom-info2">
            <div class="nexsteptrip1">
               <i class="fa fa-plus"></i>
               <p class="trif-pp"><a href="#">Add another entry</a></p>
            </div>
         </div>
      </div>
      <div class="block notes">
         <h2>Momories</h2>
         <p>( <a href="#">How was your day today</a> )</p>
      </div>
      <div class="block notes">
         <h2>Total Local Currency</h2>
      </div>
      <div class="block notes">
         <h2>Total User Currency</h2>
      </div>
      <div class="fulldetails-page">
         <p>( <a href="#">Click hare to see full day's details</a> )</p>
      </div>
      <div class="fulldetails-pagedetail1">
         <p class="ppp"> 27/3/2017</p>
         <p  class="ppp">Ireland </p>
         <p  class="ppp">Dubin </p>
      </div>
      <div class="fulldetails-pagedetail2">
         <p class="p-details"> Accom</p>
         <ul>
            <li>
               <span>(Title) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Details) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Cost and Currency) :</span>
               <p>  </p>
            </li>
         </ul>
         <p class="p-details"> Food</p>
         <ul>
            <li>
               <span>(Title) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Details) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Cost and Currency) :</span>
               <p>  </p>
            </li>
         </ul>
         <p class="p-details"> Activites</p>
         <ul>
            <li>
               <span>(Title) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Details) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Cost and Currency) :</span>
               <p>  </p>
            </li>
         </ul>
         <p class="p-details"> Transport</p>
         <ul>
            <li>
               <span>(Title) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Details) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Cost and Currency) :</span>
               <p>  </p>
            </li>
         </ul>
         <p class="p-details"> Other</p>
         <ul>
            <li>
               <span>(Title) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Details) :</span>
               <p>  </p>
            </li>
            <li>
               <span>(Cost and Currency) :</span>
               <p>  </p>
            </li>
         </ul>
      </div>
   </div>
</div>

<div class="t-hide-div"><p>Coming in June 2017</p></div>