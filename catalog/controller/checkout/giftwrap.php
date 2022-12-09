<?php
class ControllerCheckoutGiftwrap extends Controller {
	public function index() {
		if ($this->config->get('giftwrap_status’)) {
			$this->load->language('checkout/giftwrap');

			$data['heading_title'] =  sprintf($this->language->get('heading_title'), $this->currency->format($this->config->get('giftwrap_price')));

			$data['text_loading'] = $this->language->get('text_loading');

			$data['entry_giftwrap'] = $this->language->get('entry_giftwrap');

			$data['button_giftwrap'] = $this->language->get('button_giftwrap');

			if (isset($this->session->data['giftwrap'])) {
				$data['giftwrap'] = $this->session->data['giftwrap'];
			} else {
				$data['giftwrap'] = '';
			}

			if (isset($this->request->get['redirect']) && !empty($this->request->get['redirect'])) {
				$data['redirect'] = $this->request->get['redirect'];
			} else {
				$data['redirect'] = $this->url->link('checkout/cart');
			}

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/checkout/giftwrap.tpl')) {
				return $this->load->view($this->config->get('config_template') . '/template/checkout/giftwrap.tpl', $data);
			} else {
				return $this->load->view('default/template/checkout/giftwrap.tpl', $data);
			}
		}
	}

	public function giftwrap() {
		$this->load->language('checkout/giftwrap');

		$json = array();

		if (isset($this->request->post['giftwrap'])) {
			$giftwrap = $this->request->post['giftwrap'];
		} else {
			$giftwrap = '';
		}

		if (empty($this->request->post['giftwrap'])) {
			$json['error'] = $this->language->get('error_empty');
		} 

		if ($this->request->post['giftwrap'] >= $this->config->get('giftwrap_maxProduct')) {
			$json['error'] = sprintf($this->language->get('error_maximum'), $this->config->get('giftwrap_maxProduct'));
		} 

		if (!$json) {
			$this->session->data['giftwrap'] = abs($this->request->post['giftwrap']);

			$this->session->data['success'] = $this->language->get('text_success');

			if (isset($this->request->post['redirect'])) {
				$json['redirect'] = $this->url->link($this->request->post['redirect']);
			} else {
				$json['redirect'] = $this->url->link('checkout/cart');	
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}