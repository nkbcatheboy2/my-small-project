// Prevent accidental form resubmission
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

console.log("DevMaster Script Loaded...");