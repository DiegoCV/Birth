function parsearFormulario(idFormulario) {
        b = $('#'+idFormulario).serializeArray();
        c = {};
        for (var i = 0; i < b.length; i++) {
          if(b[i].value != "") c[b[i].name] = b[i].value; 
        }
        return c;       
      }