<?php  namespace Starter\Presenters;

use Weloquent\Presenters\PostPresenter as BasePostPresenter;


/**
 * PostPresenter
 * 
 * @author Bruno Barros  <bruno@brunobarros.com>
 * @copyright	Copyright (c) 2014 Bruno Barros
 */
class PostPresenter extends BasePostPresenter{

	// create presenters you want...


	/**
	 * @return string
	 */
	public function presentContent()
	{
//		if ($this->isMainQuery)
//		{
//			return get_the_content();
//		}

		$content = apply_filters('the_content', $this->post_content);

		$content = str_replace(']]>', ']]&gt;', $content);

		return $content;
	}




	/**
	 * Presenter que retorna breadcrumb como array e nome da página inicial "Início"
	 * @see  breadcrumb()
	 * @return array
	 */
	public function presentBreadcrumb()
	{
		return $this->breadcrumb('Início');
	}

	/**
	 * Retorna o breadcrumb do post ou página
	 * @param  boolean|string $overWriteHome Nome da página inicial
	 * @return array                 Array com 'title' e 'url' das páginas
	 */
	public function breadcrumb($overWriteHome = false) {

		$b = array();

		if (!is_front_page())
		{
			$b[] = array(
				'title' => ($overWriteHome) ? $overWriteHome : get_bloginfo('name'),
				'url' => get_option('home')
			);

			if ( is_category() || is_single() )
			{
				if($this->category)
				{
					foreach($this->category as $c)
					{
						$b[] = array(
							'title' => $c->name,
							'url' => $c->permalink
						);
					}
				}

				if ( is_single() )
				{
					$b[] = array(
						'title' => $this->title,
						'url' => false
					);
				}

			}
			elseif( is_date() )
			{
				$b[] = array(
					'title' => get_the_time('F \d\e Y'),
					'url' => false
				);
			}
			elseif ( is_page() && $this->post_parent )
			{
				for ($i = count($this->ancestors)-1; $i >= 0; $i--)
				{
					$b[] = array(
						'id' => $this->ancestors[$i],
						'title' => get_the_title($this->ancestors[$i]),
						'url' => get_permalink($this->ancestors[$i])
					);
				}

				$b[] = array(
					'title' => $this->title,
					'url' => false
				);

			}
			elseif (is_page())
			{
				$b[] = array(
					'title' => $this->title,
					'url' => false
				);
			}
			elseif (is_404())
			{
				$b[] = array(
					'title' => "404",
					'url' => false
				);
			}
		}
		else
		{
			$b[] = array(
				'title' => ($overWriteHome) ? $overWriteHome : get_bloginfo('name'),
				'url' => false
			);
		}
		return $b;
	}



}