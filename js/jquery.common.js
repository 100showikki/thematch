//ロールオーバー
$(function($) {
  var postfix = '_ov'; //オーバーの時ファイル名の後ろに2がついてるものを表示する.
  $('.roll').not('[src*="'+ postfix +'."]').each(function() {
    var img = $(this);
    var src = img.attr('src');
    var src_on = src.substr(0, src.lastIndexOf('.'))
      + postfix
      + src.substring(src.lastIndexOf('.'));
    $('<img>').attr('src', src_on);
    img.hover(function() {
      img.attr('src', src_on);
    }, function() {
      img.attr('src', src);
    });
  });
});

//　スムース移動
$(function(){
  $('a.smooth').click(function(){
    $('html,body').animate({ scrollTop: $($(this).attr('href')).offset().top }, 400,'swing');
  return false;
  });
});

//　コンテンツの高さ合わせ
$(function(){
  $('.mh').matchHeight();
});

//アコーディオン
$(function(){
    case01 = $("#case01 .ac_content dt");
    case02 = $("#case02 .ac_content dt");
    case03 = $("#case03 .ac_content dt");

    case01.on("click", function() {
        $(this).next().slideDown();
        case02.next().slideUp();
        case03.next().slideUp();
        $(this).addClass('open');
        case02.removeClass('open');
        case03.removeClass('open');
    });
    case02.on("click", function() {
        $(this).next().slideDown();
        case01.next().slideUp();
        case03.next().slideUp();
        $(this).addClass('open');
        case01.removeClass('open');
        case03.removeClass('open');
    });
    case03.on("click", function() {
        $(this).next().slideDown();
        case02.next().slideUp();
        case01.next().slideUp();
        $(this).addClass('open');
        case02.removeClass('open');
        case01.removeClass('open');
    });


    for_case01 = $("#for_case01");
    for_case02 = $("#for_case02");
    for_case03 = $("#for_case03");

    for_case01.on("click", function() {
        case01.next().slideDown();
        case02.next().slideUp();
        case03.next().slideUp();
        case01.addClass('open');
        case02.removeClass('open');
        case03.removeClass('open');
    });
    for_case02.on("click", function() {
        case02.next().slideDown();
        case01.next().slideUp();
        case03.next().slideUp();
        case02.addClass('open');
        case01.removeClass('open');
        case03.removeClass('open');
    });
    for_case03.on("click", function() {
        case03.next().slideDown();
        case02.next().slideUp();
        case01.next().slideUp();
        case03.addClass('open');
        case02.removeClass('open');
        case01.removeClass('open');
    });
});

$(function(){
  //スマホナビの開閉
  $('#sp_naviopen').click(function() {
    $('header #navi').slideToggle('fast', function() {
      // アニメーション完了後に実行したい処理
      $("#sp_naviopen").toggleClass('close');
    });
  });
});

$(function(){
  $(window).on('scroll', function() {
      $('#navi').toggleClass('fixed', $(this).scrollTop() > 61);
  });
});
