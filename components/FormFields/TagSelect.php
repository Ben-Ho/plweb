<?php
class FormFields_TagSelect extends Kwf_Form_Field_Abstract
{
    protected $_tags;
    protected $_values;

    public function __construct($fieldName = null, $fieldLabel = null)
    {
        parent::__construct($fieldName, $fieldLabel);
        $this->_tags = Kwf_Model_Abstract::getInstance('Tags')->getRows();
    }

    public function getValues()
    {
        return $this->_values;
    }

    public function getTemplateVars($values, $fieldNamePostfix = '', $idPrefix = '')
    {
        $ret = parent::getTemplateVars($values, $fieldNamePostfix, $idPrefix);
        $ret['html']  = '<div class="form-field-tag-select">';
        $ret['html'] .=     '<div class="selected-tags">';
        foreach ($this->_tags as $tag) {
            $selected = in_array($tag, $this->_values) ? true : false;
            $cssClass = $selected ? 'selected' : '';
            $ret['html'] .=     '<div class="tag '.$tag->id.' '.$cssClass.'">';
            $ret['html'] .=         $tag->name;
            $ret['html'] .=         '<input type="hidden" name="tag_id_'.$tag->id.'" value="'.($selected ? 'true' : 'false').'">';
            $ret['html'] .=     '</div>';
        }
        $ret['html'] .=     '</div>';
        $ret['html'] .=     '<div class="select-tags">';
        $ret['html'] .=         '<div class="new-tag">';
        $ret['html'] .=             '<div class="border"></div>';
        $ret['html'] .=             '<input type="text"/>';
        $ret['html'] .=             '<div class="add-button"></div>';
        $ret['html'] .=         '</div>';
        $ret['html'] .=         '<div class="tag-pool">';
        foreach ($this->_tags as $tag) {
            $notSelected = !in_array($tag, $this->_values) ? true : false;
            $cssClass = $notSelected ? 'not-selected' : '';
            $ret['html'] .=         '<div class="tag '.$tag->id.' '.$cssClass.'" data-tag-id="'.$tag->id.'">';
            $ret['html'] .=             $tag->name;
            $ret['html'] .=         '</div>';
        }
        $ret['html'] .=         '</div>';
        $ret['html'] .=     '</div>';
        $ret['html'] .= '</div>';
        $ret['id'] = 10;
        return $ret;
    }

    public function afterSave($row, $postData)
    {
        parent::afterSave($row, $postData);
        $tagsModel = Kwf_Model_Abstract::getInstance('Tags');
        $tags = array();
        $deleteTags = array();
        foreach ($postData as $key => $value) {
            if (strpos($key, 'XX_') === 0) {
                $select = new Kwf_Model_Select();
                $select->whereEquals('name', $value);
                $tagRow = $tagsModel->getRow($select);
                if (!$tagRow) {
                    $tagRow = $tagsModel->createRow();
                    $tagRow->name = $value;
                    //FIXME save user-id
                    $tagRow->save();
                }
                $tags[] = $tagRow;
            } else if (strpos($key, 'tag_id_') === 0) {
                $tagRow = $tagsModel->getRow(substr($key, strlen('tag_id_')));
                if ($value == 'true') {
                    $tags[] = $tagRow;
                } else if ($value == 'false') {
                    $deleteTags[] = $tagRow;
                }
            }
        }

        $productToTagsModel = Kwf_Model_Abstract::getInstance('ProductToTag');
        foreach ($deleteTags as $tag) {
            $select = new Kwf_Model_Select();
            $select->whereEquals('tag_id', $tag->id);
            $select->whereEquals('product_id', $row->id);
            $relationRow = $productToTagsModel->getRow($select);
            if ($relationRow) {
                $relationRow->delete();
            }
        }

        foreach ($tags as $tag) {
            $relationRow = $row->createChildRow('Tags');
            $relationRow->product_id = $row->id;
            $relationRow->tag_id = $tag->id;
            //FIXME save user-id
            //FIXME check ob relation schon vorhanden
            $relationRow->save();
        }
    }

    public function load($row, $postData)
    {
        $ret = parent::load($row, $postData);
        $relationRows = $row->getChildRows('Tags');
        $this->_values = array();
        foreach ($relationRows as $relationRow) {
            $this->_values[] = $relationRow->getParentRow('Tag');
        }
        return $ret;
    }
}
