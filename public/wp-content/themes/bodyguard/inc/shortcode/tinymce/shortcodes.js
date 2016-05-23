
function init() {
    tinyMCEPopup.resizeToInnerSize();
}

function insertshortcode() {
    var tagtext;
    var category;
    var columns = jQuery('#columns').val();
    var layout  = jQuery('#layout').val();
    var width   = ( jQuery('#full-width').is(':checked') ) ? 1 : 2;
    var item_per_page = jQuery('#item-per-page').val();
    var portfolio_categories = [];
    var wd_map_title = jQuery('#wd_map_title').val();
    var map_company_name = jQuery('#wd_map_company_name').val();
    var map_laltitude = jQuery('#wd_map_latitude').val();
    var map_longitude = jQuery('#wd_map_longitude').val();
    var map_zoom = jQuery('#wd_zoom').val();
    var map_height = jQuery('#wd_map_height').val();
    //var map_img = jQuery('#wd_map_img').val();
    var map_description = jQuery('#wd_map_description').val();
    var shortcode_name = jQuery('#shortcode-name').val();
    
    if( shortcode_name == "portfolio") {
      
      jQuery(".portoflio-category input[type=checkbox]").each(function( index ) {
        if(jQuery(this).prop('checked') ){
          portfolio_categories.push( jQuery( this ).val() );
        }
      });
      
      category = (portfolio_categories.length != 0) ? "category='"+ serialize(portfolio_categories) +"'" : "" ;
      
      tagtext = "[wd_vc_portfolio columns='" + columns + "' itemperpage='" +item_per_page+ "' "+ category +" layout='" + layout + "' fullwidth='" + width + "' /]";
    
    }else if( shortcode_name == "wd_google_map") {
      
      jQuery(".portfolio-category input[type=checkbox]").each(function( index ) {
        if(jQuery(this).prop('checked') ){
          b_categories.push( jQuery( this ).val() );
        }
      });
      
    category = (portfolio_categories.length != 0) ? "category='"+ serialize(portfolio_categories) +"'" : "" ;
      
      tagtext = "[wd_google_map title='"+ wd_map_title +"' description='"+ map_description +"' company_name='"+map_company_name+"' latitude='"+ map_laltitude +"' longitude='"+ map_longitude+"' zoom='"+map_zoom+"' map_height='"+ map_height +"'/]";
     
    }else if( shortcode_name == "wd_team") {
      
      jQuery(".portoflio-category input[type=checkbox]").each(function( index ) {
        if(jQuery(this).prop('checked') ){
          portfolio_categories.push( jQuery( this ).val() );
        }
      });
      
      category = (portfolio_categories.length != 0) ? "category='"+ serialize(portfolio_categories) +"'" : "" ;
      
      tagtext = "[wd_team columns='" + columns + " ' itemperpage='" +item_per_page+ "'  /]";
    
    }else if( shortcode_name == "wd_testimonial") {
      
      jQuery(".portoflio-category input[type=checkbox]").each(function( index ) {
        if(jQuery(this).prop('checked') ){
          portfolio_categories.push( jQuery( this ).val() );
        }
      });
      
      category = (portfolio_categories.length != 0) ? "category='"+ serialize(portfolio_categories) +"'" : "" ;
      
      tagtext = "[wd_testimonial  itemperpage='" +item_per_page+ "'  /]";
    
    }else if(shortcode_name == "wd_blog"){
      
      jQuery(".blog-category input[type=checkbox]").each(function( index ) {
        if(jQuery(this).prop('checked') ){
          portfolio_categories.push( jQuery( this ).val() );
        }
      });
      
      category = (portfolio_categories.length != 0) ? "category='"+ serialize(portfolio_categories) +"'" : "" ;
      
      tagtext = "[wd_blog columns='" + columns + "' itemperpage='" +item_per_page+ "' "+ category +" /]";
     
    }else{
      tagtext += "Error!!";
    }
    
    if (window.tinyMCE) {
        window.tinyMCE.execCommand('mceInsertContent', false, tagtext);
        tinyMCEPopup.editor.execCommand('mceRepaint');
        tinyMCEPopup.close();
    }
    return;
}









function serialize(mixed_value) {
  //  discuss at: http://phpjs.org/functions/serialize/
  // original by: Arpad Ray (mailto:arpad@php.net)
  // improved by: Dino
  // improved by: Le Torbi (http://www.letorbi.de/)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net/)
  // bugfixed by: Andrej Pavlovic
  // bugfixed by: Garagoth
  // bugfixed by: Russell Walker (http://www.nbill.co.uk/)
  // bugfixed by: Jamie Beck (http://www.terabit.ca/)
  // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net/)
  // bugfixed by: Ben (http://benblume.co.uk/)
  //    input by: DtTvB (http://dt.in.th/2008-09-16.string-length-in-bytes.html)
  //    input by: Martin (http://www.erlenwiese.de/)
  //        note: We feel the main purpose of this function should be to ease the transport of data between php & js
  //        note: Aiming for PHP-compatibility, we have to translate objects to arrays
  //   example 1: serialize(['Kevin', 'van', 'Zonneveld']);
  //   returns 1: 'a:3:{i:0;s:5:"Kevin";i:1;s:3:"van";i:2;s:9:"Zonneveld";}'
  //   example 2: serialize({firstName: 'Kevin', midName: 'van', surName: 'Zonneveld'});
  //   returns 2: 'a:3:{s:9:"firstName";s:5:"Kevin";s:7:"midName";s:3:"van";s:7:"surName";s:9:"Zonneveld";}'

  var val, key, okey,
    ktype = '',
    vals = '',
    count = 0,
    _utf8Size = function(str) {
      var size = 0,
        i = 0,
        l = str.length,
        code = '';
      for (i = 0; i < l; i++) {
        code = str.charCodeAt(i);
        if (code < 0x0080) {
          size += 1;
        } else if (code < 0x0800) {
          size += 2;
        } else {
          size += 3;
        }
      }
      return size;
    };
  _getType = function(inp) {
    var match, key, cons, types, type = typeof inp;

    if (type === 'object' && !inp) {
      return 'null';
    }
    if (type === 'object') {
      if (!inp.constructor) {
        return 'object';
      }
      cons = inp.constructor.toString();
      match = cons.match(/(\w+)\(/);
      if (match) {
        cons = match[1].toLowerCase();
      }
      types = ['boolean', 'number', 'string', 'array'];
      for (key in types) {
        if (cons == types[key]) {
          type = types[key];
          break;
        }
      }
    }
    return type;
  };
  type = _getType(mixed_value);

  switch (type) {
    case 'function':
      val = '';
      break;
    case 'boolean':
      val = 'b:' + (mixed_value ? '1' : '0');
      break;
    case 'number':
      val = (Math.round(mixed_value) == mixed_value ? 'i' : 'd') + ':' + mixed_value;
      break;
    case 'string':
      val = 's:' + _utf8Size(mixed_value) + ':"' + mixed_value + '"';
      break;
    case 'array':
    case 'object':
      val = 'a';
      /*
        if (type === 'object') {
          var objname = mixed_value.constructor.toString().match(/(\w+)\(\)/);
          if (objname == undefined) {
            return;
          }
          objname[1] = this.serialize(objname[1]);
          val = 'O' + objname[1].substring(1, objname[1].length - 1);
        }
        */

      for (key in mixed_value) {
        if (mixed_value.hasOwnProperty(key)) {
          ktype = _getType(mixed_value[key]);
          if (ktype === 'function') {
            continue;
          }

          okey = (key.match(/^[0-9]+$/) ? parseInt(key, 10) : key);
          vals += this.serialize(okey) + this.serialize(mixed_value[key]);
          count++;
        }
      }
      val += ':' + count + ':{' + vals + '}';
      break;
    case 'undefined':
      // Fall-through
    default:
      // if the JS object has a property which contains a null value, the string cannot be unserialized by PHP
      val = 'N';
      break;
  }
  if (type !== 'object' && type !== 'array') {
    val += ';';
  }
  return val;
}