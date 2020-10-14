{/* 
    <div class="qstn-block">
    <h6 style="margin-top:10px;">ATTENDEE ' + j + '</h6>
    <div class="item-info-user num-' + i + '">
        <div class="ova-field-user ova-fullname">
            <input data-position="' + i + '" data-id_ticket="' + item.id + '" type="text" value="' + fullname + '" placeholder="Full Name">
        </div>
        <div class="ova-field-user ova-email">
            <input data-position="' + i + '" data-id_ticket="' + item.id + '" value="' + email + '" type="email" placeholder="Email">
        </div>
        <div  class="ova-field-user ova-phone">
            <input data-position="' + i + '" data-id_ticket="' + item.id + '" type="text" value="' + phone + '" placeholder="Phone">
        </div>
    </div>

    <div class="qstn-gender num-' + i + '">
        <strong>Gender : </strong>
        <label class ="radio">
            <input class="gndr male" data-position="' + i + '" data-id_ticket="' + item.id + '" name="sex-'+ i + '-' + item.id + '" type="radio" value="male">
            <span> Male </span>
        </label>
        <label class ="radio">
            <input class="gndr female" data-position="' + i + '" data-id_ticket="' + item.id + '" name="sex-'+ i + '-' + item.id + '" type="radio" value="female">
            <span> Female </span>
        </label>
    </div> 

    '<div class="cstm_qstn"><strong>'+question+' : </strong><input type="text"></div>'
*/}

$('.wrap-custom-check').find('.cstm_qstn').each(function(){
    var typeCheck = $(this).data('type');
    var optCount = $(this).data('opt_count');
    var question = $(this).data('question');
    var arr_opt = [];
    var c=1;
    var qu = question.substring(0, 2);
    
    if(typeCheck==='check') typeCheck='checkbox';

    cstm_html += '<div class="cstm_qstn_display num-' + i +'"><strong> '+question+' </strong>';
    
    if(typeCheck === 'text'){
    
       cstm_html += '<label class ="'+typeCheck+'"><input name="'+qu+'-'+i+'-'+item.id+'" type="text" style="height: 30px;"></label>';
    
    }
    else if(typeCheck === 'checkbox' || typeCheck === 'radio'){
                
       while ( c <= optCount ){
          arr_opt[c] = $(this).data('opt'+c);
          cstm_html += ' <label class ="'+typeCheck+'"><input name="'+qu+'-'+i+'-'+item.id+'" type="'+typeCheck+'" value="'+arr_opt[c]+'"><span>'+ arr_opt[c] +'</span></label>';
          c++;
       }
    }

    cstm_html += '</div>';
});
