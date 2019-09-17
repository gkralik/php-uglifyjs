<?php

/**
 * Smarty example block function for uglifying javascript code.
 * Copyright (C) 2014 Gregor Kralik <g.kralik@gmail.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301
 * USA
 */


/**
 * @param array                    $params
 * @param mixed                    $content
 * @param Smarty_Internal_Template $template
 * @param bool                     $repeat
 *
 * @return string
 */
function smarty_block_uglifyjs($params, $content, $template, &$repeat)
{
    // only output on the closing tag
    if (!$repeat) {
        if (isset($content)) {
            if (0 >= preg_match('#<script(.*?)>(.*?)</script>#is', $content)) {
                return $content;
            } else {
                $packed = preg_replace_callback(
                    '#<script(.*?)>(.*?)</script>#is',
                    function ($matches) {
                        $packer = new GK\JavascriptPacker($matches[2]);
                        return sprintf('<script%s>%s</script>', $matches[1], $packer->pack());
                    },
                    $content
                );

                return $packed;
            }
        }
    }

    return $content;
}
