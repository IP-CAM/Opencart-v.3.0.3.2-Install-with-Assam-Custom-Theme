<?php
class ModelExtensionShippingInpost extends Model {
    public function getQuote($address) {
        $this->load->language('extension/shipping/inpost');

        $quote_data = array();

        $quote_data['inpost'] = array(
            'code'         => 'inpost.inpost',
            'title'        => $this->language->get('text_description'),
            'cost'         => $this->config->get('shipping_inpost_cost'),
            'tax_class_id' => $this->config->get('shipping_inpost_tax_class_id'),
            'text'         => $this->currency->format($this->tax->calculate($this->config->get('shipping_inpost_cost'), $this->config->get('shipping_inpost_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency'])
        );

        $method_data = array(
            'code'       => 'inpost',
            'title'      => $this->language->get('text_title'),
            'quote'      => $quote_data,
            'sort_order' => $this->config->get('shipping_inpost_sort_order'),
            'error'      => false
        );


        return $method_data;
    }
}