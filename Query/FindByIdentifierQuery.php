<?php
namespace FS\SolrBundle\Query;

class FindByIdentifierQuery extends AbstractQuery {
	
	/**
	 * 
	 * @var \SolrInputDocument
	 */
	private $document = null;
	
	public function __construct(\SolrInputDocument $document) {
		parent::__construct();
		
		$this->document = $document;
	}
	
	public function getQueryString() {
		$idField = $this->document->getField('id');
		$documentNameField = $this->document->getField('document_name_s');
		
		if ($idField == null) {
			throw new \RuntimeException('id should not be null');
		}
		
		if ($documentNameField == null) {
			throw new \RuntimeException('documentName should not be null');
		}		
		
		$query = 'id:'.$idField->values[0].' AND document_name_s:'.$documentNameField->values[0];
		
		return $query;
	}
}

?>