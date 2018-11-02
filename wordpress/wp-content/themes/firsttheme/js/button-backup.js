(function($) {
    tinymce.PluginManager.add('gavickpro_tc_button', function( editor, url ) {
        editor.addButton( 'gavickpro_tc_button', {
            title: 'Heading Line',
            icon: 'icon gavickpro-own-icon',
            onclick: function(element) {
              node = editor.selection.getNode();
              if(node.tagName == 'H1' ||  node.tagName == 'H2'  || node.tagName == 'H3'  || node.tagName == 'H4' || node.tagName == 'H5' || node.tagName == 'H6') {
                node.classList.toggle("heading-line"); 
              } else if(node.parentNode.tagName == 'H1' || node.parentNode.tagName == 'H2' || node.parentNode.tagName == 'H3' || node.parentNode.tagName == 'H4' || node.parentNode.tagName == 'H5' || node.parentNode.tagName == 'H6') {
                node.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.parentNode.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.parentNode.parentNode.parentNode.classList.toggle("heading-line"); 
              }
            }
        });
       
        editor.addButton( 'gavickpro_fontsize_button', {
            title: 'Font Size',
            cmd: 'GavickproFontsizeButtonCmd',
            icon: 'icon gavickpro-fontsize-icon',
        });
        editor.addCommand('GavickproFontsizeButtonCmd', function(){
        var selectedText = editor.selection.getContent({format: 'html'});
        var node = editor.selection.getNode();
        var fontSize = editor.dom.getStyle(node, 'font-size');
        var fontunit;
        if(fontSize.indexOf("px") != -1) {
          fontunit = 'px';
        } else if(fontSize.indexOf("pt") != -1) {
          fontunit = 'pt';
        } else if(fontSize.indexOf("em") != -1) {
          fontunit = 'em';
        } else if(fontSize.indexOf("rem") != -1) {
          fontunit = 'rem';
        }

          console.log(fontunit);
        fontSize = fontSize.replace('px', '').replace('pt', '').replace('em', '').replace('rem', '');
        var win = editor.windowManager.open({
          title: 'Font Size',
          body: [
            {
              type: 'textbox',
              name: 'size',
              label: 'Size',
              minWidth: 500,
              id: 'font-size-box',
              value: fontSize,
              onkeyup: function() {
                 var v = $('#font-size-box').val();
                    if(!(v >= 0) && v != '' && v.length > 0) {
                        //chop off the last char entered
                        $('#font-size-box').val($('#font-size-box').val().slice(0,-1));
                    }
              }
            },
            {
              type: 'listbox', 
              name: 'unit',
              label: 'Unit',
              minWidth: 500,
              values: [{text: 'px', value: 'px'}, {text: 'pt', value: 'pt'}, {text: 'em', value: 'em'}, {text: 'rem', value: 'rem'}],
              value: fontunit,
            }
          ],
          buttons: [
            {
              text: "Ok",
              subtype: "primary",
              onclick: function() {
                win.submit();
              }
            },
            {
              text: "Cancel",
              onclick: function() {
                win.close();
              }
            }
          ],
          onsubmit: function(e){
            if( e.data.size.length > 0 ) {
              paramsString = e.data.size;
            }
            if( e.data.unit.length > 0 ) {
              paramsString = paramsString+e.data.unit;
            }
            
            var regX = /(<([^>]+)>)/ig;
            selectedText = selectedText.replace(regX, "");
            returnText = '<span style="font-size:'+paramsString+'; line-height: initial;">' + selectedText+'</span>';
            editor.execCommand('mceInsertContent', 0, returnText);
          }
        });
      });
    });
})(jQuery);(function($) {
    tinymce.PluginManager.add('gavickpro_tc_button', function( editor, url ) {
        editor.addButton( 'gavickpro_tc_button', {
            title: 'Heading Line',
            icon: 'icon gavickpro-own-icon',
            onclick: function(element) {
              node = editor.selection.getNode();
              if(node.tagName == 'H1' ||  node.tagName == 'H2'  || node.tagName == 'H3'  || node.tagName == 'H4' || node.tagName == 'H5' || node.tagName == 'H6') {
                node.classList.toggle("heading-line"); 
              } else if(node.parentNode.tagName == 'H1' || node.parentNode.tagName == 'H2' || node.parentNode.tagName == 'H3' || node.parentNode.tagName == 'H4' || node.parentNode.tagName == 'H5' || node.parentNode.tagName == 'H6') {
                node.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.parentNode.parentNode.classList.toggle("heading-line"); 
              } else if(node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H1' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H2' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H3' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H4' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H5' || node.parentNode.parentNode.parentNode.parentNode.parentNode.tagName == 'H6') {
                node.parentNode.parentNode.parentNode.parentNode.parentNode.classList.toggle("heading-line"); 
              }
            }
        });
       
        editor.addButton( 'gavickpro_fontsize_button', {
            title: 'Font Size',
            cmd: 'GavickproFontsizeButtonCmd',
            icon: 'icon gavickpro-fontsize-icon',
        });
        editor.addCommand('GavickproFontsizeButtonCmd', function(){
        var selectedText = editor.selection.getContent({format: 'html'});
        var node = editor.selection.getNode();
        var fontSize = editor.dom.getStyle(node, 'font-size');
        var fontunit;
        if(fontSize.indexOf("px") != -1) {
          fontunit = 'px';
        } else if(fontSize.indexOf("pt") != -1) {
          fontunit = 'pt';
        } else if(fontSize.indexOf("em") != -1) {
          fontunit = 'em';
        } else if(fontSize.indexOf("rem") != -1) {
          fontunit = 'rem';
        }

          console.log(fontunit);
        fontSize = fontSize.replace('px', '').replace('pt', '').replace('em', '').replace('rem', '');
        var win = editor.windowManager.open({
          title: 'Font Size',
          body: [
            {
              type: 'textbox',
              name: 'size',
              label: 'Size',
              minWidth: 500,
              id: 'font-size-box',
              value: fontSize,
              onkeyup: function() {
                 var v = $('#font-size-box').val();
                    if(!(v >= 0) && v != '' && v.length > 0) {
                        //chop off the last char entered
                        $('#font-size-box').val($('#font-size-box').val().slice(0,-1));
                    }
              }
            },
            {
              type: 'listbox', 
              name: 'unit',
              label: 'Unit',
              minWidth: 500,
              values: [{text: 'px', value: 'px'}, {text: 'pt', value: 'pt'}, {text: 'em', value: 'em'}, {text: 'rem', value: 'rem'}],
              value: fontunit,
            }
          ],
          buttons: [
            {
              text: "Ok",
              subtype: "primary",
              onclick: function() {
                win.submit();
              }
            },
            {
              text: "Cancel",
              onclick: function() {
                win.close();
              }
            }
          ],
          onsubmit: function(e){
            if( e.data.size.length > 0 ) {
              paramsString = e.data.size;
            }
            if( e.data.unit.length > 0 ) {
              paramsString = paramsString+e.data.unit;
            }
            
            var regX = /(<([^>]+)>)/ig;
            selectedText = selectedText.replace(regX, "");
            returnText = '<span style="font-size:'+paramsString+'; line-height: initial;">' + selectedText+'</span>';
            editor.execCommand('mceInsertContent', 0, returnText);
          }
        });
      });
    });
})(jQuery);