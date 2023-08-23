FSWatcher.writeFile('./newCustomer.json', JSON.stringify(newObject), err=>{
    if(err){
        console.log(err);
    }else{
        console.log('File Successfully written!');
    }
});