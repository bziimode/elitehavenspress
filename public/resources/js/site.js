 //========= HEADER MENU
 const menu = document.querySelector(".menu");
 const menuMain = menu.querySelector(".menu-main");
 const goBack = menu.querySelector(".go-back");
 const menuTrigger = document.querySelector(".mobile-menu-trigger");
 const closeMenu = menu.querySelector(".mobile-menu-close");
 let subMenu;
 
 menuMain.addEventListener("click", (e) =>{
     if(!menu.classList.contains("active")){
         return;
     }
 if(e.target.closest(".menu-item-has-children")){
     const hasChildren = e.target.closest(".menu-item-has-children");
     showSubMenu(hasChildren);
 }
 });
 goBack.addEventListener("click",() =>{
     hideSubMenu();
 })
 menuTrigger.addEventListener("click",() =>{
     toggleMenu();
 })
 closeMenu.addEventListener("click",() =>{
     toggleMenu();
 })
 document.querySelector(".menu-overlay").addEventListener("click",() =>{
     toggleMenu();
 })
 function toggleMenu(){
     menu.classList.toggle("active");
     document.querySelector(".menu-overlay").classList.toggle("active");
 }
 function showSubMenu(hasChildren){
     subMenu = hasChildren.querySelector(".sub-menu");
     subMenu.classList.add("active");
     const menuTitle = hasChildren.querySelector("i").parentNode.childNodes[0].textContent;
     menu.querySelector(".mobile-menu-head").classList.add("active");
 }

 function hideSubMenu(){  
     setTimeout(() =>{
     subMenu.classList.remove("active");	
     },300); 
     menu.querySelector(".current-menu-title").innerHTML="";
     menu.querySelector(".mobile-menu-head").classList.remove("active");
 }
 
 window.onresize = function(){
     if(this.innerWidth >991){
         if(menu.classList.contains("active")){
             toggleMenu();
         }

     }
 }
 //========= END HEADER MENU


// HOMEPAGE DROPDOWN & MENU SEARCH ICON
const homeDropdown = document.querySelector('.dropdown');
const drpContent = document.querySelector('.dropdown-content');
const menuCLick = document.querySelector('.menuCLick1');
const menuCLick2 = document.querySelector('.menuCLick2');
const menuCLick3 = document.querySelector('.menuCLick3');
const drpShow = document.querySelector('.dropdown1');
const close1 = document.querySelector('.close');
const btnClik = document.querySelector(".dropbtn");


// menu search icon click
function openDrp() {
 drpShow.style.cssText = `
 display: flex; 
 opacity: 1;
 visibility: visible;
`;
drpContent.style.cssText = `
 display: block; 
`;
}

if(btnClik) {
 btnClik.addEventListener('click', openDrp);
}
if(menuCLick) {
 menuCLick.addEventListener('click', openDrp);
}
if(menuCLick2) {
 menuCLick2.addEventListener('click', openDrp);
}
if(menuCLick3) {
 menuCLick3.addEventListener('click', openDrp);
}

// close dropdown
if(close1) {
 close1.addEventListener("click", () => {
     drpShow.style.cssText = `
     display: none;
   `;
   drpContent.style.cssText = `
   display: none; 
 `;
 });
}

// HEADER STICKY MENU
let header = document.querySelector('header')
window.addEventListener('scroll', () => {
header.classList.toggle('sticky', window.scrollY > 0);
});

// load more
$( document ).ready(function () {
 $(".content").slice(0, 10).show();
 if ($(".content:hidden").length != 0) {
     $("#loadMore").show();
 }		
 if ($(".content").length < 10) {
    $("#loadMore").hide();
}	
 $("#loadMore").on('click', function (e) {
     e.preventDefault();
     $(".content:hidden").slice(0, 5).slideDown();
     if ($(".content:hidden").length == 0) {
         $("#loadMore").fadeOut('slow');
     }
 });
 $(".content").slice(0, 5).show();
 $("#loadMore").on("click", function(e){
   e.preventDefault();
   $(".content:hidden").slice(0, 5).slideDown();
//    if($(".content:hidden").length == 0) {
//      $("#loadMore").text("No Content").addClass("noContent");
//    }
 });
});

 if($(window).width() < "767"){
    $(".content").slice(0, 5).show();
    if ($(".content:hidden").length != 0) {
        $("#loadMore").show();
    }		
    if ($(".content").length <= 5) {
        $("#loadMore").hide();
    }	
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".content:hidden").slice(0, 5).slideDown();
        if ($(".content:hidden").length == 0) {
            $("#loadMore").fadeOut('slow');
        }
    });
    $(".content").slice(0, 5).show();
    $("#loadMore").on("click", function(e){
      e.preventDefault();
      $(".content:hidden").slice(0, 5).slideDown();
    //   if($(".content:hidden").length == 0) {
    //     $("#loadMore").text("No Content").addClass("noContent");
    //   }
    });	
}

// DROPDOWN CHECK IN / CHECK OUT
var aday = 86400000;
var today = new Date();
var tomorrow = new Date(today.getTime() + aday);

var minDate = false;
var maxDate = false;

var arr = 'txtArrivalDate';
var dep = 'txtDepartDate';
var date5
var nextDate
var t


$(document).ready(function () {
    $.datepicker.setDefaults({ dateFormat: "dd M yy", changeMonth: true, changeYear: true });

    $('body').on('focus', '.txtArrivalDate', function (e) {

        if (!$(this).hasClass('hasDatepicker')) {             
            var sibl = $(this).attr('class').replace(arr, dep);

            var t = $(this).attr('id')
            $(this).datepicker({                   
                changeYear: true,
                changeMonth:true,
                minDate: today,                  
                dateFormat: "dd M yy",                    
                onSelect: function (date) {

                    date5 = new Date();
                    try {

                        var l = $(this).attr('id')
                        date5 = new Date($('#txtArrivalDate').val());                      
                        if (t.indexOf('sidebar') >= 0) {
                            arr = 'sidebar_txtArrivalDate'
                            dep = 'sidebar_txtDepartDate'
                            date5 = new Date($('#sidebar_txtArrivalDate').val());
                        }
                        else if (t.indexOf('quick') >= 0) {
                            arr = 'quick_txtArrivalDate'
                            dep = 'quick_txtDepartDate'
                            date5 = new Date($('#quick_txtArrivalDate').val());
                        }
                        else {
                            arr = 'txtArrivalDate'
                            dep = 'txtDepartDate'
                            date5 = new Date($('#txtArrivalDate').val());
                        }
                    }
                    catch (e) {
                        arr = 'txtArrivalDate'
                        dep = 'txtDepartDate'
                        date5 = new Date($('#txtArrivalDate').val());
                    }
                    date5.setDate(date5.getDate() + 1)
                  
                    $('#' + dep).datepicker()
                    $('#' + dep).datepicker('option', 'minDate', date5, 'startDate', date5, "changeMonth", true, "changeYear", true);
                    $('#' + dep).datepicker("setDate", date5);
                    $('#' + dep).datepicker("refresh");
                    setTimeout(function () {
                        $('#' + dep).datepicker('show');
                    }, 1);                      
                   
                },
                onClose: function () {
                    $('#' + dep).focus()
                    $('#' + dep).trigger('click')
                    try { $('#' + dep).datepicker('show'); } catch (e) {}                      
                }
            })
        }
    });

   $('#' + dep).datepicker()
   $('#'+dep).datepicker('option', 'onSelect', function () {      
       loadDynamic()
    })
});


function getMonthString(m){
    switch(m){
        case 1:
            return "Jan"
            break;
        case 2:
            return "Feb"
            break;
        case 3:
            return "Mar"
            break;
        case 4:
            return "Apr"
            break;
        case 5:
            return "May"
            break;
        case 6:
            return "Jun"
            break;
        case 7:
            return "Jul"
            break;
        case 8:
            return "Aug"
            break;
        case 9:
            return "Sep"
            break;
        case 10:
            return "Oct"
            break;
        case 11:
            return "Nov"
            break;
        case 12:
            return "Dec"
            break;
    }
}

function getDate() {
    var todayDate = new Date();
    var dd = todayDate.getDate();
    var mm = todayDate.getMonth()+1; 
    var yyyy = todayDate.getFullYear();
  
    today = dd + ' ' + getMonthString(mm) + ' ' + yyyy;

    var fiveDays = new Date();
    fiveDays.setDate(new Date().getDate()+5);
    var day5 = fiveDays.getDate()

    plusFiveDays = day5 + ' ' + getMonthString(mm) + ' ' + yyyy;

    document.getElementById("quick_txtArrivalDate").value = today;
    document.getElementById("quick_txtDepartDate").value = plusFiveDays;
  }
  
  window.onload = function() {
    getDate();
  };

//   newsletter select country
$("#drpCountry").on('change',function () {
    if($(this).val() == "") $(this).addClass("empty");
    else $(this).removeClass("empty")
});
$("#drpCountry").trigger('change');


// back to top
const btn = $('.top-arrow');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});






