(function($) {
    tinymce.PluginManager.add('gavickpro_tc_button', function( editor, url ) {       
        editor.addButton( 'gavickpro_fontsize_button', {
            title: 'Font Size',
            cmd: 'GavickproFontsizeButtonCmd',
            icon: 'icon gavickpro-fontsize-icon',
        });editor.addButton( 'gavickpro_fontsize_button2', {
            title: 'Font Size',
            cmd: 'GavickproFontsizeButtonCd',
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
        } else if(fontSize.indexOf("rem") != -1) {
          fontunit = 'rem';
        } else if(fontSize.indexOf("em") != -1) {
          fontunit = 'em';
        }

        fontSize = fontSize.replace('px', '').replace('pt', '').replace('rem', '').replace('em', '');
        var win = editor.windowManager.open({
          title: 'Font Size',
          body: [
            {
              type: 'textbox',
              name: 'size',
              label: 'Size',
              minWidth: 500,
              id: 'font-size-box',
              value: fontSize
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