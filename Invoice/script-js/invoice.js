/*******************************************************************************
 * Invoice - 1.0.20190312.1000
 * Last Revision: 2019/03
 * Contributors: Jorge V. Rodrigues - developer
 ******************************************************************************/

// Get queries result
function filter_textarea(all_data) {

    var TS = "";
    var STR_SQL = "";
    var msg = "";

    var lines = all_data.split("\n");

    for (var i = 0; i < lines.length; i++) {

        msg = lines[i];
        msg.trim();

        if (msg.length > 1) {
            if (msg.match(/.+ERROR.+INVBR_CREATE=(.+?) and/)) {
                TS = (msg.match(/.+ERROR.+INVBR_CREATE=(.+?) and/))[1];
                STR_SQL = `UPDATE TBCLIDOC SET MAIL = 'gtrt@email.com' WHERE INVBR_CREATE = TO_TIMESTAMP('${TS}', 'YYYY-MM-DD HH24.MI.SS.FF9');`;
                document.form_query.output.value += STR_SQL;
                document.form_query.output.value += "\n";
            }
        }
    }

    document.form_query.output.disabled = false;

    var copyTest = document.getElementById("output_text");
    copyTest.select();
    document.execCommand("copy");
    document.getElementById("explanation").innerHTML = "Select statements copied to the clipboard (CTRL+V).";
}

// Clear all fields
function clear_fields() {
    document.getElementById("explanation").innerHTML = "SQL update statements to execute (CTRL+A -> CTRL+C).";
    document.form_query.output.disabled = true
}
