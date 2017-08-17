<?php

/**
 * Overload of CWebUser to set some more methods.
 */
class WebUser extends CWebUser
{

        public function isAdmin()
        {
                // When Users are implemented, change this to check roles.
                return ( $this->getName() == 'Julien' || $this->getName() == 'julien');
        }

}
?>