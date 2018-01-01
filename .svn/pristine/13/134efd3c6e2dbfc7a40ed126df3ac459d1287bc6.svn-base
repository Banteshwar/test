<?php

/**
 * CodeIgniter helper for generate share url and buttons (Twitter, Facebook, Buzz, VKontakte)
 *
 * @version 1.0
 * @author Ibragimov Renat <info@mrak7.com> www.mrak7.com
 */

if( !function_exists('share_check') ){
	/**
	 * Check type of share and return $URL or FALSE
	 * 
	 * @param	string $type	type of share
	 * @return	string|bool
	 */
	function share_check( $type='' ){
		$url = array(
			'twitter'	=> 'http://twitter.com/share',
			'facebook'	=> 'http://facebook.com/sharer.php',
			'google+'       => 'http://www.google.com/buzz/post',
			'pinterest'	=> 'developers.pinterest.com',
		);
		return (isset($url[$type])) ? $url[$type] : FALSE;
	}
}

if( !function_exists('share_url') ){
	/**
	 * Generate url for share at some social networks
	 *
	 * @param	string $type	type of share
	 * @param	array $args		parameters for share
	 * @return	string
	 */
	function share_url( $type='', $args=array() ){
		$url = share_check( $type );
		if( $url === FALSE ){
			log_message( 'debug', 'Please check your type share_url('.$type.')' );
			return "#ERROR-check_share_url_type";
		}

		$params = array();
		if( $type == 'twitter' ){
			foreach( explode(' ', 'url via text related count lang counturl') as $v ){
				if( isset($args[$v]) ) $params[$v] = $args[$v];
			}
		}elseif( $type == 'facebook' ){
			$params['u']		= $args['url'];
			$params['t']		= $args['text'];
		}elseif( $type == 'buzz'){
			$params['url']		= $args['url'];
			$params['imageurl']	= $args['image'];
			$params['message']	= $args['text'];
		}elseif( $type == 'vkontakte'){
			$params['url']		= $args['url'];
		}

		$param = '';
		foreach( $params as $k=>$v ) $param .= '&'.$k.'='.urlencode($v);
		return $url.'?'.trim($param, '&');
	}
}

if( !function_exists('share_button') ){
	/**
	 * Generate buttons for share at some social networks
	 *
	 * @param	string $type	type of share
	 * @param	array $args		parameters for share
	 * @return string
	 */
	function share_button( $type='', $args=array() ){
		$url = share_check( $type );
		if( $url === FALSE ){
			log_message( 'debug', 'Please check your type share_button('.$type.')' );
			return "#ERROR-check_share_button_type";
		}

		$params = array();
		$param	= '';

		if( $type == 'twitter'){
			if( isset($args['iframe']) ){
				$url = share_url( $type, $args );
				list($url, $param) = explode('?', $url);
				$button = <<<DOT
                                <div class="s_left">
				<iframe allowtransparency="true" frameborder="0" scrolling="no" style="width:130px; height:50px;"
				src="http://platform.twitter.com/widgets/tweet_button.html?{$param}">
                                </iframe>
                                </div>
DOT;
			}else{
				foreach( explode(' ', 'url via text related count lang counturl') as $v ){
					if( isset($args[$v]) ) $params[] = 'data-'.$v.'="'.$args[$v].'"';
				}
				$param = implode( ' ', $params );
				$button = <<<DOT
				<a href="http://twitter.com/share" class="twitter-share-button" {$param}>Tweet</a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
DOT;
			}
		}elseif( $type == 'facebook' ){
			if( !isset($args['type']) ) $args['type'] = 'button_count';
			if( isset($args['fb']) ){
				$params = array( 'type'=>'type', 'href'=>'url', 'class'=>'s_left' );
				foreach( $params as $k=>$v ){
					if( isset($args[$v]) ) $param .= $k.'="'.$args[$v].'"';
				}
				$button = "<fb:share-button {$param}></fb:share-button>";
			}else{
				$params = array( 'type'=>'type', 'share_url'=>'url' );
				foreach( $params as $k=>$v ){
					if( isset($args[$v]) ) $param .= $k.'="'.$args[$v].'"';
				}
				if( !isset($args['button_text']) ) $args['button_text'] = 'Share to Facebook';
				$button = <<<DOT
				<a name="fb_share" {$param}>{$args['button_text']}</a>
				<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
DOT;
			}
		}elseif( $type == 'google+' ){
			$params = array( 'button-style'=>'type', 'local'=>'lang', 'url'=>'url', 'imageurl'=>'image');
			foreach( $params as $k=>$v ){
				if( isset($args[$v]) ) $param .= ' data-'.$k.'="'.$args[$v].'"';
			}
			if( !isset($args['title']) ) $args['title'] = 'Share to Google';
                        $url = isset($args['url']) ? $args['url']: 'false';
			$button = <<<DOT
                        <div class="a2a_kit a2a_default_style s_left">
                        <a class="a2a_button_google_plus_share"  data-href="{$url}"></a>
                        </div>
                        <script async src="//static.addtoany.com/menu/page.js"></script>     
                                
                       
DOT;
		}elseif( $type == 'pinterest' ){
			$url = isset($args['url']) ? $args['url']: 'false';
			$button = <<<DOT
                         <script type="text/javascript">
                        (function(d){
                            var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
                            p.type = 'text/javascript';
                            p.async = true;
                            p.src = '//assets.pinterest.com/js/pinit.js';
                            f.parentNode.insertBefore(p, f);
                        }(document));
                        </script>
                        <div class='s_left'>
                        <a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/?url={$url}&media=https://s-media-cache-ak0.pinimg.com/736x/17/34/8e/17348e163a3212c06e61c41c4b22b87a.jpg&description=So%20delicious!" data-pin-config="beside">
                            <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" />
                        </a>
			</div>
DOT;
		}
		return $button;
	}
}
?>