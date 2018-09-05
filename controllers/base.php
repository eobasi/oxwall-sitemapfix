<?php

/**
 * This software is intended for use with Oxwall Free Community Software http://www.oxwall.org/ and is a proprietary licensed product. 
 * For more information see License.txt in the plugin folder.

 * ---
 * Copyright (c) 2018, Ebenezer Obasi
 * http://www.eobasi.com
 * All rights reserved.
 * info@eobasi.com.

 * Redistribution and use in source and binary forms, with or without modification, are not permitted provided.

 * This plugin should be bought from the developer. For details contact info@eobasi.com.

 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 * INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Sitemap base action controller
 *
 * @author Ebenezer Obasi <info@eobasi.com>
 * @package ow.ow_plugins.sitemapfix.controllers
 * @since 1.0
 */
class SITEMAPFIX_CTRL_Base extends BASE_CTRL_Base
{
    public function sitemap()
    {
        $part = isset($_GET['part']) ? (int) $_GET['part'] : null;

        $sitemap = BOL_SeoService::getInstance()->getSitemapPath($part);

        if ( file_exists($sitemap) )
        {
            ob_clean();
            header('Content-Type: text/xml');

            echo file_get_contents($sitemap);
            exit;
        }

        throw new Redirect404Exception();
    }
}