<?php /*a:4:{s:90:"/www/beidou/mart/zsbd_mart/shangtao/home/view/default/shops/orders/list_wait_delivery.html";i:1536627231;s:69:"/www/beidou/mart/zsbd_mart/shangtao/home/view/default/shops/base.html";i:1536627232;s:62:"/www/beidou/mart/zsbd_mart/shangtao/home/view/default/top.html";i:1536627233;s:65:"/www/beidou/mart/zsbd_mart/shangtao/home/view/default/footer.html";i:1536653987;}*/ ?>
<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>待发货订单 - 卖家中心<?php echo WSTConf('CONF.mallTitle'); ?></title>
<link href="__STYLE__/css/common.css?v=<?php echo $v; ?>" rel="stylesheet">
<link href="__STYLE__/css/shop.css?v=<?php echo $v; ?>" rel="stylesheet">

<style>
.notice{padding: 3px 6px;color: #e55454}
.notice_icon{vertical-align: text-bottom;}
</style>

<script type="text/javascript" src="/static/js/jquery.min.js?v=<?php echo $v; ?>"></script>
<script type="text/javascript" src="/static/plugins/layer/layer.js?v=<?php echo $v; ?>"></script>
	  
<script type='text/javascript' src='/static/js/common.js?v=<?php echo $v; ?>'></script>

<script type='text/javascript' src='__STYLE__/js/common.js?v=<?php echo $v; ?>'></script>
<script type='text/javascript' src='/static/plugins/lazyload/jquery.lazyload.min.js?v=<?php echo $v; ?>'></script>
<script>
window.conf = {"ROOT":"","APP":"","STATIC":"/static","SUFFIX":"<?php echo config('url_html_suffix'); ?>", "SMS_VERFY":"<?php echo WSTConf('CONF.smsVerfy'); ?>","PHONE_VERFY":"<?php echo WSTConf('CONF.phoneVerfy'); ?>","GOODS_LOGO":"<?php echo WSTConf('CONF.goodsLogo'); ?>","SHOP_LOGO":"<?php echo WSTConf('CONF.shopLogo'); ?>","MALL_LOGO":"<?php echo WSTConf('CONF.mallLogo'); ?>","USER_LOGO":"<?php echo WSTConf('CONF.userLogo'); ?>","IS_LOGIN":"<?php if((int)session('WST_USER.userId')>0): ?>1<?php else: ?>0<?php endif; ?>","TIME_TASK":"1","MESSAGE_BOX":"<?php echo WSTShopMessageBox(); ?>","ROUTES":'<?php echo WSTRoute(); ?>',"IS_CRYPT":"<?php echo WSTConf('CONF.isCryptPwd'); ?>"}
	<?php echo WSTLoginTarget(1); ?>
$(function() {
	WST.initShopCenter();
});
</script>
</head>
<body>



<?php $wstTagAds =  model("common/Tags")->listAds("index-top-ads",99,86400); foreach($wstTagAds as $key=>$tads){if(($tads['adFile']!='')): ?>
<div class="index-top-ads">
  <a href="<?php echo $tads['adURL']; ?>" <?php if(($tads['isOpen'])): ?>target='_blank'<?php endif; if(($tads['adURL']!='')): ?>onclick="WST.recordClick(<?php echo $tads['adId']; ?>)"<?php endif; ?> onfocus="this.blur();">
    <img src="/<?php echo $tads['adFile']; ?>"></a>
  <a href="javascript:;" class="close-ads" onclick="WST.closeAds(this)"></a>
</div>
<?php endif; } ?>

<div class="wst-header">
    <div class="wst-nav">
		<ul class="headlf">
		<?php if(session('WST_USER.userId') >0): ?>
		   <li class="drop-info">
			  <div class="drop-infos">
			  <a href="<?php echo Url('home/users/index'); ?>">欢迎您，<?php echo session('WST_USER.userName')?session('WST_USER.userName'):session('WST_USER.loginName'); ?></a>
			  </div>
			  <div class="wst-tag dorpdown-user">
			  	<div class="wst-tagt">
			  	   <div class="userImg" >
				  	<img class='usersImg' data-original="<?php echo WSTUserPhoto(session('WST_USER.userPhoto')); ?>"/>
				   </div>	
				  <div class="wst-tagt-n">
				    <div>
					  	<span class="wst-tagt-na"><?php echo session('WST_USER.userName')?session('WST_USER.userName'):session('WST_USER.loginName'); ?></span>
					  	<?php if((int)session('WST_USER.rankId') > 0): ?>
					  		<img src="/<?php echo session('WST_USER.userrankImg'); ?>" title="<?php echo session('WST_USER.rankName'); ?>"/>
					  	<?php endif; ?>
				  	</div>
				  	<div class='wst-tags'>
			  	     <span class="w-lfloat"><a onclick='WST.position(15,0)' href='<?php echo Url("home/users/edit"); ?>'>用户资料</a></span>
			  	     <span class="w-lfloat" style="margin-left:10px;"><a onclick='WST.position(16,0)' href='<?php echo Url("home/users/security"); ?>'>安全设置</a></span>
			  	    </div>
				  </div>
			  	  <div class="wst-tagb" >
			  		<a onclick='WST.position(5,0)' href='<?php echo Url("home/orders/waitReceive"); ?>'>待收货订单</a>
			  		<a onclick='WST.position(60,0)' href='<?php echo Url("home/logmoneys/usermoneys"); ?>'>我的余额</a>
			  		<a onclick='WST.position(49,0)' href='<?php echo Url("home/messages/index"); ?>'>我的消息</a>
			  		<a onclick='WST.position(13,0)' href='<?php echo Url("home/userscores/index"); ?>'>我的积分</a>
			  		<a onclick='WST.position(41,0)' href='<?php echo Url("home/favorites/goods"); ?>'>我的关注</a>
			  		<a style='display:none'>咨询回复</a>
			  	  </div>
			  	<div class="wst-clear"></div>
			  	</div>
			  </div>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			<a href='<?php echo Url("home/messages/index"); ?>' target='_blank' onclick='WST.position(49,0)'>消息（<span id='wst-user-messages'>0</span>）</a>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			  <div><a href="javascript:WST.logout();">退出</a></div>
			</li>
			<?php else: ?>
			<li class="drop-info">
			  <div>欢迎来到<?php echo WSTMSubstr(WSTConf('CONF.mallName'),0,13); ?><a href="<?php echo Url('home/users/login'); ?>" onclick="WST.currentUrl();">&nbsp;&nbsp;请&nbsp;登录</a></div>
			</li>
			<li class="spacer">|</li>
			<li class="drop-info">
			  <div><a href="<?php echo Url('home/users/regist'); ?>" onclick="WST.currentUrl();">免费注册</a></div>
			</li>
			<?php endif; ?>
		</ul>
		<ul class="headrf" style='float:right;'>
		    <li class="j-dorpdown" style="width: 86px;">
				<div class="drop-down" style="padding-left:0px;">
					<a href="<?php echo Url('home/users/index'); ?>" target="_blank">我的订单<i class="di-right"><s>◇</s></i></a>
				</div>
				<div class='j-dorpdown-layer order-list'>
				   <div><a href='<?php echo Url("home/orders/waitPay"); ?>' onclick='WST.position(3,0)'>待付款订单</a></div>
				   <div><a href='<?php echo Url("home/orders/waitReceive"); ?>' onclick='WST.position(5,0)'>待发货订单</a></div>
				   <div><a href='<?php echo Url("home/orders/waitAppraise"); ?>' onclick='WST.position(6,0)'>待评价订单</a></div>
				</div>
			</li>	
			<?php if((WSTDatas('ADS_TYPE',4))): ?>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down2 pdr5"><i class="di-left"></i><a href="#" target="_blank">手机商城</a></div>
				<div class='j-dorpdown-layer sweep-list'>
				   <div class="qrcodea">
					   <div id='qrcodea' class="qrcodeal"></div>
					   <div class="qrcodear">
					   	<p>扫描二维码</p><span>下载手机客户端</span>
					   	<br/>
					   	<a >Android</a>
					   	<br/>
					   	<a>iPhone</a>
					   </div>
				   </div>
				</div>
			</li>
			<?php endif; if((WSTConf('CONF.wxenabled')==1)): ?>
			<li class="spacer">|</li>
			<li class="j-dorpdown" style="width:78px;">
				<div class="drop-down" style="padding:0 5px;"><a href="#" target="_blank">关注我们</a></div>
				<div class='j-dorpdown-layer des-list' style="width:120px;">
					<div style="height:114px;"><?php if((WSTConf('CONF.wxAppLogo'))): ?><img src="/<?php echo WSTConf('CONF.wxAppLogo'); ?>" style="height:114px;"><?php endif; ?></div>
					<div>关注我们</div>
				</div>
			</li>
			<?php endif; ?>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down4 pdr5"><a href="#" target="_blank">我的收藏</a></div>
				<div class='j-dorpdown-layer foucs-list'>
				   <div><a href="<?php echo Url('home/favorites/goods'); ?>" onclick='WST.position(41,0)'>商品收藏</a></div>
				   <div><a href="<?php echo Url('home/favorites/shops'); ?>" onclick='WST.position(46,0)'>店铺收藏</a></div>
				</div>
			</li>
			<li class="spacer">|</li>
			<li class="j-dorpdown">
				<div class="drop-down drop-down5 pdr5" ><a href="#" target="_blank">客户服务</a></div>
				<div class='j-dorpdown-layer des-list'>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=1"); ?>' target='_blank'>帮助中心</a></div>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=8"); ?>' target='_blank'>售后服务</a></div>
				   <div><a href='<?php echo Url("home/helpcenter/view","id=3"); ?>' target='_blank'>常见问题</a></div>
				    <?php echo hook('homeDocumentContact',['type'=>'shopService']); ?>
				</div>
			</li>
			<li class="spacer">|</li>
			<?php if(session('WST_USER.userId') > 0): if(session('WST_USER.userType') == 0 or !session('WST_USER.shopId')): ?>
				<li class="j-dorpdown">
				<div class="drop-down pdl5" ><a href="#" target="_blank">商家管理<i class="di-right"><s>◇</s></i></a></div>
				<div class='j-dorpdown-layer foucs-list'>
				   <div><a href="<?php echo url('home/shops/login'); ?>" onclick="WST.currentUrl();">商家登录</a></div>
				   <div><a href="<?php echo url('home/shops/join'); ?>" rel="nofollow" onclick="WST.currentUrl('<?php echo url("home/shops/join"); ?>');">商家入驻</a></div>
				</div>
				</li>
				<?php else: 
               		$shopMenuUrls = model('home/HomeMenus')->getShopMenusUrl();
               		$roleId = (int)session('WST_USER.roleId');
				 ?>
				<li class="j-dorpdown">
				    <div class="drop-down pdl5" >
				       <a href="<?php echo Url('home/shops/index'); ?>" rel="nofollow" target="_blank">卖家中心<i class="di-right"><s>◇</s></i></a>
				    </div>
				    <div class='j-dorpdown-layer product-list last-menu'>
						<?php if($roleId==0 || in_array('home/orders/waitdelivery',$shopMenuUrls)): ?>
					   		<div><a href='<?php echo Url("home/orders/waitdelivery"); ?>' onclick='WST.position(24,1)'>待发货订单</a></div>
					   	<?php endif; if($roleId==0 || in_array('home/ordercomplains/shopcomplain',$shopMenuUrls)): ?>
					   		<div><a href='<?php echo Url("home/ordercomplains/shopcomplain"); ?>' onclick='WST.position(25,1)'>投诉订单</a></div>
					   	<?php endif; if($roleId==0 || in_array('home/goods/sale',$shopMenuUrls)): ?>
				   			<div><a href='<?php echo Url("home/goods/sale"); ?>' onclick='WST.position(32,1)'>商品管理</a></div>
				   		<?php endif; if($roleId==0 || in_array('home/shopcats/index',$shopMenuUrls)): ?>
				   			<div><a href='<?php echo Url("home/shopcats/index"); ?>' onclick='WST.position(30,1)'>商品分类</a></div>
				   		<?php endif; ?>
					</div>
				</li>
				<?php endif; else: ?>
				<li class="j-dorpdown">
				<div class="drop-down pdl5" ><a href="#" target="_blank">商家管理<i class="di-right"><s>◇</s></i></a></div>
				<div class='j-dorpdown-layer foucs-list'>
				   <div><a href="<?php echo url('home/shops/login'); ?>" onclick="WST.currentUrl();">商家登录</a></div>
				   <div><a href="<?php echo url('home/shops/join'); ?>" rel="nofollow" onclick="WST.currentUrl('<?php echo url("home/shops/join"); ?>');">商家入驻</a></div>
				</div>
				</li>
				
			<?php endif; ?>
			</li>
		</ul>
		<div class="wst-clear"></div>
  </div>
</div>
<script>
$(function(){
	//二维码
	//参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
	var a = qrcode(8, 'H');
	var url = window.location.host+window.conf.APP;
	a.addData(url);
	a.make();
	$('#qrcodea').html(a.createImgTag());
});
function goShop(id){
  location.href=WST.U('home/shops/home','shopId='+id);
}
</script>
<script type='text/javascript' src='__STYLE__/js/qrcode.js'></script>



	
<div class='wst-lite-bac'>
<div class='wst-lite-container'>
   <div class='wst-logo'><a href='<?php echo app('request')->root(true); ?>'><img src="/<?php echo WSTConf('CONF.mallLogo'); ?>" height="80" width='160'></a></div>
   <div class="wst-lite-tit"><span>卖家中心</span><a class="wst-lite-in" href='<?php echo app('request')->root(true); ?>'>返回商城首页</a></div>
   <div class="wst-lite-sea">
      <div class='search'>
      	  <input type="hidden" id="search-type" value="<?php echo isset($keytype)?1:0; ?>"/>

      	  <ul class="j-search-box">
            <li class="j-search-type">
              搜<span><?php if(isset($keytype)): ?>店铺<?php else: ?>商品<?php endif; ?></span>&nbsp;<i class="arrow"> </i>
            </li>
            <li class="j-type-list">
              <?php if(isset($keytype)): ?>
              <div data="0">商品</div>
              <?php else: ?>
              <div data="1">店铺</div>
              <?php endif; ?>
            </li>
          </ul>
          
	      <input type="text" id='search-ipt' class='search-ipt' value='<?php echo isset($keyword)?$keyword:""; ?>'/>
	      <div id='search-btn' class="search-btn" onclick='javascript:WST.search(this.value)'></div>
      </div>
   </div>
   <div class="wst-clear"></div>
</div>
<div class="wst-clear"></div>
</div>

<div class="wst-wrap">
          <div class='wst-header'>
			<div class="wst-shop-nav">
				<div class="wst-nav-box">
				    <?php $homeMenus = WSTHomeMenus(1); if(is_array($homeMenus['menus']) || $homeMenus['menus'] instanceof \think\Collection || $homeMenus['menus'] instanceof \think\Paginator): $i = 0; $__LIST__ = $homeMenus['menus'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<a href="/<?php echo $vo['menuUrl']; ?>?homeMenuId=<?php echo $vo['menuId']; ?>"><li class="liselect wst-lfloat <?php if(($vo['menuId'] == $homeMenus['menuId1'])): ?>wst-nav-boxa<?php endif; ?>"><?php echo $vo['menuName']; ?></li></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="wst-clear"></div>
				</div>
			</div>
			<div class="wst-clear"></div>
		</div>
          <div class='wst-nav'></div>
          <div class='wst-main'>
            <div class='wst-menu'>
              <?php if(isset($homeMenus['menus'][$homeMenus['menuId1']]['list'])): if(is_array($homeMenus['menus'][$homeMenus['menuId1']]['list']) || $homeMenus['menus'][$homeMenus['menuId1']]['list'] instanceof \think\Collection || $homeMenus['menus'][$homeMenus['menuId1']]['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $homeMenus['menus'][$homeMenus['menuId1']]['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menus): $mod = ($i % 2 );++$i;?>
              	<span class='wst-menu-title'><?php echo $menus['menuName']; ?><img src="__STYLE__/img/user_icon_sider_zhankai.png"></span>
              	<ul>
                <?php if(isset($menus['list'])): if(is_array($menus['list']) || $menus['list'] instanceof \think\Collection || $menus['list'] instanceof \think\Paginator): $k = 0; $__LIST__ = $menus['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($k % 2 );++$k;?>
                  	<li class="<?php if(($homeMenus['menuId3']==$menu['menuId'])): ?>wst-menua<?php endif; ?> wst-menuas" onclick="getMenus('<?php echo $menu['menuId']; ?>','<?php echo $menu['menuUrl']; ?>')">
                  	<?php echo $menu['menuName']; ?>
                  	<span id="mId_<?php echo $menu['menuId']; ?>"></span>
                  	</li>
                	<?php endforeach; endif; else: echo "" ;endif; endif; ?>
              	</ul>
              	<?php endforeach; endif; else: echo "" ;endif; endif; ?>
              
             
             
            </div>
            <div class='wst-content'>
            
  <div class="wst-shop-head"><span>待发货订单</span></div>
  <div class='wst-shop-tbar'>
     订单号：<input type='text' class="s-ipt" id='orderNo'/> 
     支付方式：<select name="payType" id="payType" class="s-ipt">
                <option value="-1">请选择</option>
                <option value="0">货到付款</option>
                <option value="1">在线支付</option>
               </select>

     配送方式：<select name="deliverType" id="deliverType" class="s-ipt">
                <option value="-1">请选择</option>
                <option value="0">送货上门</option>
                <option value="1">自提</option>
               </select>

     <a class="s-btn" onclick="waitDivleryByPage()">查询</a>
     <a class="s-btn" style="float: right;line-height:16px;height:16px;margin-top:2px;" onclick="javascript:toExport(2,0,'')">导出</a>
  </div>
  <div class='wst-shop-content'>
    <table class='wst-order-list'>
       <thead>
	      <tr class='head'>
	         <th>订单详情</th>
	         <th width="107">支付方式/配送信息</th>
	         <th>金额</th>
	         <th width="87">操作</th>
	      </tr>
	   </thead>
	   <tbody id='loadingBdy'>
	       <tr id='loading' class='empty-row' style='display:none'>
	            <td colspan='4'><img src="__STYLE__/img/loading.gif">正在加载数据...</td>
	       </tr>
       </tbody>
       <script id="tblist" type="text/html">
       {{# for(var i = 0; i < d.length; i++){ }}
       <tbody class="j-order-row">
         <tr class='empty-row'>
            <td colspan='4'>&nbsp;</td>
         </tr>
         <tr class='order-head'>
            <td colspan='4' align='right'>
              <div class='time'>{{d[i].createTime}}</div>
              <div class='orderno'>
              订单号：{{d[i].orderNo}}
			    {{# if(d[i].orderSrc==0){ }}<i class="order-pc"></i>
			    {{# }else if(d[i].orderSrc==1){ }}<i class="order-wx"></i>
				{{# }else if(d[i].orderSrc==2){ }}<i class="order-mo"></i>
				{{# }else if(d[i].orderSrc==3){ }}<i class="order-app"></i>
				{{# }else if(d[i].orderSrc==4){ }}<i class="order-ios"></i>
        {{# }else if(d[i].orderSrc==5){ }}<i class="order-weapp"></i>
			    {{# } }}
                {{# if(d[i].noticeDeliver==1){ }}
                 <span class="notice">
                  <img class="notice_icon" src="__STYLE__/img/nocite_deliver.png" alt="发货提醒" width="20" height="20" />
                  尽快发货
                </span>
                {{# } }}
                {{# if(d[i].orderCodeTitle!=""){ }}
                <span class="order_from">{{d[i].orderCodeTitle}}</span>
                {{# } }}
              </div>
              <div>
              {{d[i].status}}
              </div>
            </td>
         </tr>
         {{# 
          var tmp = null,rows = d[i]['list'].length;
          for(var j = 0; j < d[i]['list'].length; j++){
             tmp = d[i]['list'][j]; 
         }}

         <tr class='goods-box'>
            <td>

               <div class='goods-img'>
                <a href="{{WST.U('home/goods/detail','goodsId='+tmp.goodsId)}}" target='_blank'>
                <img data-original='/{{tmp.goodsImg}}'  title='{{tmp.goodsName}}' class="gImg">
                </a>
               </div>

               <div class='goods-name'>
                 <div>{{tmp.goodsName}}</div>
                 <div>{{tmp.goodsSpecNames}}</div>
               </div>
               <div class='goods-extra'>{{tmp.goodsPrice}} x {{tmp.goodsNum}}</div>

            </td>
            {{# if(j==0){ }}
            <td rowspan="{{rows}}">
                <div>{{d[i].payTypeName}}</div>
                <div>{{d[i].deliverTypeName}}</div>
            </td>
            <td rowspan="{{rows}}">
                <div>商品金额：¥{{d[i].goodsMoney}}</div>
                <div class='line'>运费：¥{{d[i].deliverMoney}}</div>
                <div>实付金额：¥{{d[i].realTotalMoney}}</div>
            </td>
            <td rowspan="{{rows}}">
                <div><a href='#none' onclick='javascript:deliver({{d[i].orderId}},{{d[i].deliverType}})'>【发货】</a></div>
                <div><a target='blank' href='{{WST.U("home/orders/orderPrint","id="+d[i].orderId)}}'>【打印订单】</a></div>
                <div><a href='#none' onclick='view({{d[i].orderId}})'>【订单详情】</a></div>
            </td>
            {{#}}}
         </tr>
         {{# } }}
         <tr>
          <td colspan="4">
            {{# if(WST.blank(d[i].orderRemarks)!=''){  }}
               <div class="order_remaker">【用户留言】{{d[i].orderRemarks}}</div>
             {{# }  }}
          </td>
         </tr>
       </tbody>
       {{# } }}
       </script>
       <tr class='empty-row'>
            <td colspan='4' id='pager' align="center" style='padding:5px 0px 5px 0px'>&nbsp;</td>
       </tr>
    </table>
    <div id='deliverBox' style='display:none'>
       <form id='deliverForm' autocomplete='off'>
       <table class='wst-form wst-box-top'>
          <tr>
            <th width='80'>快递公司：</th>
            <td>
               <select id='expressId'>
                  <option value=''>请选择</option>
                  <?php if(is_array($express) || $express instanceof \think\Collection || $express instanceof \think\Paginator): $i = 0; $__LIST__ = $express;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <option value='<?php echo $vo["expressId"]; ?>'><?php echo $vo["expressName"]; ?></option>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
               </select>
            </td>
          </tr>
          <tr>
            <th>快递号：</th>
            <td><input type='text' id='expressNo' maxLength='20' style='width:80%'></td>
          </tr>
       </table>
       </form>
    </div>
    <div id='editMoneyBox' style='display:none'>
       <form id='newOrderForm' autocomplete='off'>
       <table class='wst-form wst-box-top'>
          <tr>
            <th width='120'>订单号：</th>
            <td><span id='m_orderNo'></span></td>
          </tr>
          <tr>
            <th>商品总价格：</th>
            <td>¥<span id='m_goodsMoney'></span></td>
          </tr>
          <tr>
            <th>运费：</th>
            <td>¥<span id='m_deliverMoney'></span></td>
          </tr>
          <tr>
            <th>商品总价格：</th>
            <td>¥<span id='m_totalMoney'></span></td>
          </tr>
           <tr>
            <th>实际支付价格：</th>
            <td>¥<span id='m_realTotalMoney' class='j-warn-order-money'></span></td>
          </tr>
          <tr>
            <th>新价格：</th>
            <td><input type='text' id='m_newOrderMoney' maxLength='10' style='width:150px' onkeyup="javascript:WST.isChinese(this,1)" onkeypress="return WST.isNumberdoteKey(event,true)" onblur='javascript:WST.limitDecimal(this,2)'></td>
          </tr>
       </table>
       </form>
    </div>
  </div>

            </div>
          </div>
          <div style='clear:both;'></div>
          <br/>
        </div>

	<div style="border-top: 1px solid #df2003;padding-bottom:25px;margin-top:35px;min-width:1200px;"></div>
<ul class="wst-footer-info">
	<li><div class="wst-footer-info-img wst-fimg1"></div>
		<div class="wst-footer-info-text">
			<h1>支付宝支付</h1>
			<p>支付宝签约商家</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg2"></div>
		<div class="wst-footer-info-text">
			<h1>正品保证</h1>
			<p>100%原产地</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg3"></div>
		<div class="wst-footer-info-text">
			<h1>退货无忧</h1>
			<p>七天退货保障</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg4"></div>
		<div class="wst-footer-info-text">
			<h1>免费配送</h1>
			<p>满98元包邮</p>
		</div>
	</li>
	<li><div class="wst-footer-info-img wst-fimg5"></div>
		<div class="wst-footer-info-text">
			<h1>货到付款</h1>
			<p>400城市送货上门</p>
		</div>
	</li>
</ul>
<div class="wst-footer-help">
	<div class="wst-footer">
		<div class="wst-footer-hp-ck1">
			<?php $_result=WSTHelps(5,6);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
			<div class="wst-footer-wz-ca">
				<div class="wst-footer-wz-pt">
					<span class="wst-footer-wz-pn"><?php echo $vo1["catName"]; ?></span>
					<ul style='margin-left:25px;'>
						<?php if(is_array($vo1['articlecats']) || $vo1['articlecats'] instanceof \think\Collection || $vo1['articlecats'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo1['articlecats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
						<li style='list-style:disc;color:#999;font-size:12px;'>
						<a href="<?php echo Url('Home/Helpcenter/view',array('id'=>$vo2['articleId'])); ?>"><?php echo WSTMSubstr($vo2['articleTitle'],0,8); ?></a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>

			<div class="wst-contact">
				<ul>
					<li style="height:30px;">
						<div class="icon-phone"></div><p class="call-wst">服务热线：</p>
					</li>
					<li style="height:38px;">
						<?php if((WSTConf('CONF.serviceTel')!='')): ?><p class="email-wst"><?php echo WSTConf('CONF.serviceTel'); ?></p><?php endif; ?>
					</li>
					<li style="height:85px;">
						<div class="qr-code" style="position:relative;">
						    <?php if((WSTConf('CONF.wxenabled')==1) && WSTConf('CONF.wxAppLogo')): ?>
							<img src="/<?php echo WSTConf('CONF.wxAppLogo'); ?>" style="height:110px;">
							<?php endif; ?>
							<div class="focus-wst">
							    <?php if((WSTConf('CONF.serviceQQ')!='')): ?>
								<p class="focus-wst-qr">在线客服：</p>
								<p class="focus-wst-qra">
						          <a href="tencent://message/?uin=<?php echo WSTConf('CONF.serviceQQ'); ?>&Site=QQ交谈&Menu=yes">
									  <img border="0" src="<?php echo WSTProtocol(); ?>wpa.qq.com/pa?p=1:<?php echo WSTConf('CONF.serviceQQ'); ?>:7" alt="QQ交谈" width="71" height="24" />
								  </a>
								</p>
          						<?php endif; if((WSTConf('CONF.serviceEmail')!='')): ?>
								<p class="focus-wst-qr">商城邮箱：</p>
								<p class="focus-wst-qre"><?php echo WSTConf('CONF.serviceEmail'); ?></p>
								<?php endif; ?>
							</div>
						</div>
					</li>
				</ul>
			</div>


			<div class="wst-clear"></div>
		</div>
		<div class="wst-footer-flink">

		</div>
	    <div class="wst-footer-hp-ck3">
	        <div class="links">
	           <?php $navs = WSTNavigations(1); if(is_array($navs) || $navs instanceof \think\Collection || $navs instanceof \think\Paginator): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
               <a href="<?php echo $vo['navUrl']; ?>" <?php if($vo['isOpen']==1): ?>target="_blank"<?php endif; ?>><?php echo $vo['navTitle']; ?></a>
               <?php if($i< count($navs)): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        </div>
	        <div class="copyright">
	        <?php 
	        	if(WSTConf('CONF.mallFooter')!=''){
	         		echo htmlspecialchars_decode(WSTConf('CONF.mallFooter'));
	        	}
			 
				if(WSTConf('CONF.visitStatistics')!=''){
					echo htmlspecialchars_decode(WSTConf('CONF.visitStatistics'))."<br/>";
			    }
			 ?>
	        
	        </div>
	    </div>
	</div>
</div>
<?php echo hook('homeDocumentListener'); ?>
<?php echo hook('initCronHook'); ?>
<style>
	.copyright a{
		margin-left:5px;
	}
</style>


<script type='text/javascript' src='__STYLE__/shops/orders/orders.js?v=<?php echo $v; ?>'></script>
<script>
$(function(){
	waitDivleryByPage();
})
</script>

<script>
function getMenus(menuId,menuUrl){
    $.post(WST.U('home/index/getMenuSession'), {menuId:menuId}, function(data){
    	location.href=WST.U(menuUrl);
    });
}
</script>
</body>
</html>