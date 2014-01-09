opencart-free-shipping-over
===========================

Opencart module to calculate shipping cost based on sub-total. 

opencart-free-shipping-over plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

opencart-free-shipping-over plugin is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with opencart-free-shipping-over plugin. If not, see <http://www.gnu.org/licenses/>.

Description 
==================================

This plugin will allow admin user to set free shipping over a certain subtotal (minimum value defined by the admin) of the user cart. The display name is set to "Raccomandata" (an italian shipment), but you can change this easily to fit your needs.

For example, if a client has products in his cart and is paying less than 80€, the shipping is not free. Otherwise, when the subtotal is equal or more than 80€, the shipping is free.

Install
==================================

Extract/add files to proper filepath:
	admin/controller/shipping/raccomandata.php
	admin/language/english/shipping/raccomandata.php
	admin/language/italian/shipping/raccomandata.php
	admin/view/template/shipping/raccomandata.tpl
	catalog/model/shipping/raccomandata.php
	catalog/language/italian/shipping/raccomandata.php
	catalog/language/english/shipping/raccomandata.php

Modify MySQL DB:
	INSERT INTO PREFIX_extension (`type`, `code`) VALUES ('shipping', 'raccomandata');

Access OpenCart admin backend:
	Give permission to system -> user groups -> top admin ->  */raccomandata (ie: to all entries with category)
	Set costs by category in extensions -> shipping -> raccomandata

Changelog
==================================

2014-01-08 -> Initial release.
