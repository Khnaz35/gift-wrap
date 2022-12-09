<?php
class ControllerTotalGiftwrap extends Controller {
	
	private $error = array(); 

	public function index(){

		$this->load->language('total/giftwrap');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model("setting/setting");

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('giftwrap', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		/* Entry */
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['text_edit'] = $this->language->get('text_edit');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_maxProduct'] = $this->language->get('entry_maxProduct');
		$data['entry_enabled'] = $this->language->get('entry_enabled');
		$data['entry_disabled'] = $this->language->get('entry_disabled');
		
		/* Help */
		$data['help_maxProduct'] = $this->language->get('help_maxProduct');
		
		/* Buttons */
		$data['btn_save'] = $this->language->get('btn_save');
		$data['btn_cancel'] = $this->language->get('btn_cancel');

		$data['save'] = $this->url->link('total/giftwrap', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL');

		/* Status */
		if (isset($this->request->post['giftwrap_status'])){
			$data['giftwrap_status'] = $this->request->post['giftwrap_status'];
		}else{
			$data['giftwrap_status'] = $this->config->get('giftwrap_status');
		}

		/* Price */
		if (isset($this->request->post['giftwrap_price'])){
			$data['giftwrap_price'] = $this->request->post['giftwrap_price'];
		}else{
			$data['giftwrap_price'] = $this->config->get('giftwrap_price');
		}

		/* Max Product */
		if (isset($this->request->post['giftwrap_maxProduct'])){
			$data['giftwrap_maxProduct'] = $this->request->post['giftwrap_maxProduct'];
		}else{
			$data['giftwrap_maxProduct'] = $this->config->get('giftwrap_maxProduct');
		}

		/* Sort Order */
		if (isset($this->request->post['giftwrap_sort_order'])){
			$data['giftwrap_sort_order'] = $this->request->post['giftwrap_sort_order'];
		}else{
			$data['giftwrap_sort_order'] = $this->config->get('giftwrap_sort_order');
		}

		/* Erro */
		if (isset($this->error['warning'])){
			$data['error_warning'] = $this->error['warning'];
		}else{
			$data['error_warning'] = '';
		}

		/* Breamcrumbs */
		$data['breamcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_total'),
			'href' => $this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('total/giftwrap', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('total/giftwrap', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL');


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('total/giftwrap.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'total/giftwrap')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}