<?php
class ModelTotalGiftwrap extends Model {
	public function getTotal(&$total_data, &$total, &$taxes) {
		if ($this->config->get('giftwrap_status') && isset($this->session->data['giftwrap'])){

			$this->load->language('total/giftwrap');

			$total_data[] = array(
				'code'  => 'giftwrap',
	      		        'remove' => $this->url->link('checkout/cart/removeGiftwrap', 'giftwrap=' . $this->session->data['giftwrap'], 'SSL'),
				'title' => sprintf($this->language->get('text_giftwrap'), $this->session->data['giftwrap'] ),
				'value' => sprintf($this->session->data['giftwrap'] * $this->config->get('giftwrap_price')),
				'sort_order' => $this->config->get('giftwrap_sort_order')
			);

			$total += sprintf($this->session->data['giftwrap'] * $this->config->get('giftwrap_price'));

		}
	}	

}