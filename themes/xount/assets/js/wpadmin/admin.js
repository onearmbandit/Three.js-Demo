//import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js';
//import Swiper, { Navigation, Pagination } from '../../../../../node_modules/swiper/';


jQuery(window).load(function() {
  console.log('inside admin.js');

  /* tab backend preview - start */
  setTimeout(function(){
    jQuery('.wp-tab-block .block-editor-block-list__layout div[data-type="clabs/tabcontent"]').each(function(i,el){
      el.style.display = "none";
    });
    var k = 0;
    var j = 0;
    var hk = 0;
    var hj = 0;
    jQuery('.block-editor-block-list__layout div[data-type="clabs/tabsblocks"]').each(function(n,el){
      jQuery(this).find('.tabs-verticle--dekstop .wp-tab-block .tab .tab_inner:first-child').find('button.tableft').trigger('click');
      jQuery(this).find('.tabs-verticle--dekstop .wp-tab-block .block-editor-block-list__layout div:first-child').css('display','block');

      jQuery(this).find('.tabs-verticle--dekstop .wp-tab-block .block-editor-block-list__layout div[data-type="clabs/tabcontent"]').each(function(i,el){
        k = k+1;
        el.id = 'tabs-verticle'+k;
      });
      jQuery(this).find('.tabs-verticle--dekstop .wp-tab-block .tab .tab_inner').each(function(){
        j = j+1;
        jQuery(this).find('button.tableft').attr('data-id','tabs-verticle'+j+'');
      });
      /* horizontal */
      jQuery(this).find('.tabs-horizontal--dekstop .wp-tab-block .tab .tab_inner:first-child').find('button.tableft').trigger('click');
      jQuery(this).find('.tabs-horizontal--dekstop .wp-tab-block .block-editor-block-list__layout div:first-child').css('display','block');

      jQuery(this).find('.tabs-horizontal--dekstop .wp-tab-block .block-editor-block-list__layout div[data-type="clabs/tabcontent"]').each(function(i,el){
        hk = hk+1;
        el.id = 'tabs-horizontal'+hk;
      });
      jQuery(this).find('.tabs-horizontal--dekstop .wp-tab-block .tab .tab_inner').each(function(){
        hj = hj+1;
        jQuery(this).find('button.tableft').attr('data-id','tabs-horizontal'+hj+'');
      });
    });
  },2000);
  /* vertical */
  jQuery('body').on('click','.tabs-verticle--dekstop .tableft',function(){
    jQuery(this).parent().parent().find('.tableft').removeClass('active');
    jQuery(this).parent().parent().parent().find('.block-editor-block-list__layout div[data-type="clabs/tabcontent"]').css('display','none');
    var tabid = '#'+jQuery(this).attr('data-id');
    jQuery(this).addClass('active');
    jQuery(tabid).css('display','block');
  });

  jQuery('body').on('click','.tabs-verticle--dekstop .removetab',function(){
    var c = jQuery(this);
    setTimeout(function(){
      var t = c.parent().find('button.tableft').attr('data-id');
      c.parent().parent().find('.tab_inner').each(function(i){
        i = i+1;
        var c2 = jQuery(this);
        var newid = c2.find('button.tableft').attr('data-id');
        c.parent().parent().parent().find('.block-editor-block-list__layout div[data-type="clabs/tabcontent"]:nth-child('+i+')').attr('id',newid);
      });
    },200);
  });

  /* horizontal */
  jQuery('body').on('click','.tabs-horizontal--dekstop .tableft',function(){
    jQuery(this).parent().parent().find('.tableft').removeClass('active');
    jQuery(this).parent().parent().parent().find('.block-editor-block-list__layout div[data-type="clabs/tabcontent"]').css('display','none');
    var tabid = '#'+jQuery(this).attr('data-id');
    jQuery(this).addClass('active');
    jQuery(tabid).css('display','block');
  });

  jQuery('body').on('click','.tabs-horizontal--dekstop .removetab',function(){
    var c = jQuery(this);
    setTimeout(function(){
      var t = c.parent().find('button.tableft').attr('data-id');
      c.parent().parent().find('.tab_inner').each(function(i){
        i = i+1;
        var c2 = jQuery(this);
        var newid = c2.find('button.tableft').attr('data-id');
        c.parent().parent().parent().find('.block-editor-block-list__layout div[data-type="clabs/tabcontent"]:nth-child('+i+')').attr('id',newid);
      });
    },200);
  });
  var v;
  var hv;
  jQuery('body').on('click','.tabs__nav-link',function(){

    var ct = jQuery(this);
    jQuery('.tableft').removeClass('active');
    var t = ct.parent().parent().parent().find('.tabs-verticle--dekstop .block-editor-inner-blocks .block-editor-block-list__layout div[data-type="clabs/tabcontent"]');
    var ht = ct.parent().parent().parent().find('.tabs-horizontal--dekstop .block-editor-inner-blocks .block-editor-block-list__layout div[data-type="clabs/tabcontent"]');
    jQuery('.wp-tab-block .block-editor-block-list__layout div[data-type="clabs/tabcontent"]').css('display','none');
    var vlast = ct.parent().parent().parent().find('.tabs-verticle--dekstop .tab_inner:nth-child('+t.length+')').find('button.tableft').attr('data-id');
    if(vlast){
      v = vlast.replace("tabs-verticle", "");
      v++;
    } else {
      v = 1;
    }
    var hlast = ct.parent().parent().parent().find('.tabs-horizontal--dekstop .tab_inner:nth-child('+ht.length+')').find('button.tableft').attr('data-id');
    if(hlast){
      hv = hlast.replace("tabs-horizontal", "");
      hv++;
    } else {
      hv = 1;
    }
    setTimeout(function(){
      var child = ct.parent().parent().parent().find('.tabs-verticle--dekstop .tab_inner:last-child').attr('data-child');
      var child2 = ct.parent().parent().parent().find('.tabs-horizontal--dekstop .tab_inner:last-child').attr('data-child');
      if(child){
        ct.parent().parent().parent().find('.tabs-verticle--dekstop .tab_inner:nth-child('+child+')').find('button.tableft').attr('data-id','tabs-verticle'+v+'');
        ct.parent().parent().parent().find('.tabs-verticle--dekstop .block-editor-block-list__layout div[data-type="clabs/tabcontent"]:nth-child('+child+')').attr('id','tabs-verticle'+v+'');
        jQuery('.tableft[data-id="tabs-verticle'+v+'"]').addClass('active');
      }
      if(child2){
        ct.parent().parent().parent().find('.tabs-horizontal--dekstop .tab_inner:nth-child('+child2+')').find('button.tableft').attr('data-id','tabs-horizontal'+hv+'');
        ct.parent().parent().parent().find('.tabs-horizontal--dekstop .block-editor-block-list__layout div[data-type="clabs/tabcontent"]:nth-child('+child2+')').attr('id','tabs-horizontal'+hv+'');
        jQuery('.tableft[data-id="tabs-horizontal'+hv+'"]').addClass('active');
      }


    },1000);
  });
  /* tab backend preview - start */

  /* photo slider - start */
  setTimeout(function(){
    var photoSliderSwiper = new Swiper(".jsPhotoSliderSwiper", {
      observer: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true,
      },
      breakpoints: {
        640: {
          pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
            formatFractionCurrent: function (number) {
                return ('0' + number).slice(-2);
            },
            formatFractionTotal: function (number) {
                return ('0' + number).slice(-2);
            },
            renderFraction: function (currentClass, totalClass) {
                return '<span class="' + currentClass + '"></span>' +
                      '<span class="seperator"></span>' +
                      '<span class="' + totalClass + '"></span>';
            }
        }
        }
      }
    });
  },2000);
  jQuery('body').on('click','.addphoto_slide',function(){
    var str1 = jQuery(this).attr('class');
    var str2 = "slidecount0";
    if(str1.indexOf(str2) != -1){
      var photoSliderSwiper = new Swiper(".jsPhotoSliderSwiper", {
        observer: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          type: "bullets",
          clickable: true,
        },
        breakpoints: {
          640: {
            pagination: {
              el: '.swiper-pagination',
              type: 'fraction',
              formatFractionCurrent: function (number) {
                  return ('0' + number).slice(-2);
              },
              formatFractionTotal: function (number) {
                  return ('0' + number).slice(-2);
              },
              renderFraction: function (currentClass, totalClass) {
                  return '<span class="' + currentClass + '"></span>' +
                         '<span class="seperator"></span>' +
                         '<span class="' + totalClass + '"></span>';
              }
          }
          }
        }
      });
    }
  });
  /* photo slider - end */

  /*quote slider*/
  setTimeout(function(){
    var swiper = new Swiper(".jsQuoteDesktopSwiper", {
      observer: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },

      breakpoints: {
        640: {
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          }
        }
      }
    });
  },2000);
  jQuery('body').on('click','.additems',function(){
    var str1 = jQuery(this).attr('class');
    var str2 = "quotecount0";
    if(str1.indexOf(str2) != -1){
      var swiper = new Swiper(".jsQuoteDesktopSwiper", {
        observer: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },

        breakpoints: {
          640: {
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            }
          }
        }
      });
    }
  });

  /*post list slider*/
  setTimeout(function(){
    var eventCardSwiper = new Swiper(".jsEventCardSwiper", {
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      slidesPerView: 1,
      spaceBetween: 20,
      observer: true,
      // autoHeight: true,

      breakpoints: {
        640: {
          navigation: {
            nextEl: ".postListNext",
            prevEl: ".postListPrev",
          },
          slidesPerView: 1,
          // autoHeight: true,
        },

        769: {
          navigation: {
            nextEl: ".postListNext",
            prevEl: ".postListPrev",
          },
          slidesPerView: 2
        }
      }
    });
  },2000);

  /*Card slider */
  setTimeout(function(){
    var cardBlockSwiper = new Swiper(".jsCardBlockSwiper", {
      observer: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      slidesPerView: 1,
      spaceBetween: 20,
      // autoHeight: true,

      breakpoints: {
        640: {
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          slidesPerView: 2
        }
      }
    });
  },2000);

  jQuery('body').on('click','.addcarditems',function(){
    var str1 = jQuery(this).attr('class');
    var str2 = "cardcount0";
    if(str1.indexOf(str2) != -1){
      var cardBlockSwiper = new Swiper(".jsCardBlockSwiper", {
        observer: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        slidesPerView: 1,
        spaceBetween: 20,
        // autoHeight: true,

        breakpoints: {
          640: {
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            slidesPerView: 2
          }
        }
      });
    }
  });

  // Latest Tweets Slider
  setTimeout(function(){
  var tweetSwiper = new Swiper(".jsTweetSwiper", {
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      observer: true,
      breakpoints: {
        640: {
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          }
        }
      }
    });
  },2000);
  jQuery('body').on('click','.addnewtweet',function(){
    var str1 = jQuery(this).attr('class');
    var str2 = "tweetcount0";
    if(str1.indexOf(str2) != -1){
      var tweetSwiper = new Swiper(".jsTweetSwiper", {
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        observer: true,
        breakpoints: {
          640: {
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            }
          }
        }
      });
    }
  });

  // latest tweet
  setTimeout(function(){
    jQuery('.jsTweetSwiper .swiper-slide').each(function(){
      var current = jQuery(this);
      var dataurl = current.find('.tweet_url input').val();
      jQuery.ajax({
        url: 'https://publish.twitter.com/oembed?url='+dataurl+'',
        crossDomain: true,
        dataType: 'jsonp',
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer 6QXNMEMFHNY4FJ5ELNFMP5KRW52WFXN5")
        }, success: function(data){
            current.find('.tweet-preview').html(data['html']);
        }
      });
    });
  },2000);
  jQuery('body').on('click','.embedbutton',function(){
    var c = jQuery(this).parent().parent();
    var dataurl = c.find('.tweet_url input').val();
    jQuery.ajax({
      url: 'https://publish.twitter.com/oembed?url='+dataurl+'',
      crossDomain: true,
      dataType: 'jsonp',
      beforeSend: function(xhr) {
          xhr.setRequestHeader("Authorization", "Bearer 6QXNMEMFHNY4FJ5ELNFMP5KRW52WFXN5")
      }, success: function(data){
          c.find('.tweet-preview').html(data['html']);
      }
    });
  });

    /* media slider - start */
    setTimeout(function(){
      var imageDataSwiper = new Swiper(".jsimageDataSwiper", {
        observer: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: {
            navigation: {
              nextEl: ".image-data-next",
              prevEl: ".image-data-prev",
            }
          }
        }
      });
    },2000);
    jQuery('body').on('click','.addmediaslide',function(){
      var str1 = jQuery(this).attr('class');
      var str2 = "mediacount0";
      if(str1.indexOf(str2) != -1){
        var imageDataSwiper = new Swiper(".jsimageDataSwiper", {
          observer: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            640: {
              navigation: {
                nextEl: ".image-data-next",
                prevEl: ".image-data-prev",
              }
            }
          }
        });
      }
    });
    /* media slider - end */
});
