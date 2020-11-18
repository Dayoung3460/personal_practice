function download(){
    const blob = new Blob(['this is a new file'], { type: "file/jpg"});
    downloadFile(blob, "cv.jpg")
}

function downloadFile(blob, filename){
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = filename;
    a.click();

    
}