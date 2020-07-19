<?php

namespace AdminPagenotes;

use ElggObject;

class Note extends ElggObject {
    const SUBTYPE = 'admin_pagenote';

    /**
	 * {@inheritDoc}
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

        $this->attributes['subtype'] = self::SUBTYPE;
        $this->attributes['access'] = ACCESS_PRIVATE;
	}

	public function canComment($user_guid = 0, $default = null) {
		return false;
	}
}