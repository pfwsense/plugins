{#
 # Copyright (C) 2014-2017 Shanghai Sciinfo Technology Co., Ltd.
 # Copyright (C) 2017-2018 Michael Muenz <m.muenz@gmail.com>
 # All rights reserved.
 #
 # Redistribution and use in source and binary forms, with or without modification,
 # are permitted provided that the following conditions are met:
 #
 # 1.  Redistributions of source code must retain the above copyright notice,
 #     this list of conditions and the following disclaimer.
 #
 # 2.  Redistributions in binary form must reproduce the above copyright notice,
 #     this list of conditions and the following disclaimer in the documentation
 #     and/or other materials provided with the distribution.
 #
 # THIS SOFTWARE IS PROVIDED ``AS IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES,
 # INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY
 # AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 # AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,
 # OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 # SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 # INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 # CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 # ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 # POSSIBILITY OF SUCH DAMAGE.
 #}

<ul class="nav nav-tabs" data-tabs="tabs" id="maintabs">
    <li class="active"><a data-toggle="tab" href="#general">{{ lang._('General') }}</a></li>
    <li><a data-toggle="tab" href="#neighbor">{{ lang._('Neighbors') }}</a></li>
</ul>

<div class="tab-content content-box tab-content">
    <div id="general" class="tab-pane fade in active">
        {{ partial("layout_partials/base_form",['fields':generalForm,'id':'frm_general_settings'])}}
        <div class="col-md-12" style="padding-bottom: 1.5em;">
            <hr />
            <button class="btn btn-primary" id="saveAct" type="button"><b>{{ lang._('Save') }}</b> <i id="saveAct_progress"></i></button>
        </div>
    </div>
    <div id="neighbor" class="tab-pane fade in">
      <pre id="listneighbor"></pre>
    </div>
</div>

<script>

// Put API call into a function, needed for auto-refresh
function update_neighbor() {
    ajaxCall(url="/api/lldpd/service/neighbor", sendData={}, callback=function(data,status) {
        $("#listneighbor").text(data['response']);
    });
}

$( document ).ready(function () {
    var data_get_map = {'frm_general_settings':"/api/lldpd/general/get"};
    mapDataToFormUI(data_get_map).done(function(data){
        formatTokenizersUI();
        $('.selectpicker').selectpicker('refresh');
    });

    ajaxCall(url="/api/lldpd/service/status", sendData={}, callback=function(data,status) {
        updateServiceStatusUI(data['status']);
    });

    // Call function update_neighbor with a auto-refresh of 3 seconds
    setInterval(update_neighbor, 3000);

    // link save button to API set action
    $("#saveAct").click(function () {
        saveFormToEndpoint(url="/api/lldpd/general/set", formid='frm_general_settings',callback_ok=function () {
            $("#saveAct_progress").addClass("fa fa-spinner fa-pulse");
            ajaxCall(url="/api/lldpd/service/reconfigure", sendData={}, callback=function(data,status) {
                ajaxCall(url="/api/lldpd/service/status", sendData={}, callback=function(data,status) {
                    updateServiceStatusUI(data['status']);
                });
                $("#saveAct_progress").removeClass("fa fa-spinner fa-pulse");
            });
        });
    });
});
</script>
