let Tx = require("ethereum-tx");
const Web3 = require("web3");
const web3 = new Web3(
  "https://ropsten.infura.io/v3/2370f6afaf244598ad82d3632116a89a"
);

const account1 = "0x706dc9091039B62Ce65A238647786e53c9D77033";
const account2 = "0x706dc9091039B62Ce65A238647786e53c9D77033";

const pk1 = Buffer.from(
  "724f8f464066267aebd96b1fe13957fed01632aeb0a36690836ecbabdc2cdb4c"
);
const pk2 = Buffer.from(
  "5114637af2df3617f6b42484d2e3b1319ea2c86c8088755270f97ca10534811e"
);

web3.eth.getBalance(account1, (err, bal) => {
  console.log(web3.utils.fromWei(bal, "ether"));
});

web3.eth.getBalance(account2, (err, bal) => {
  console.log(web3.utils.fromWei(bal, "ether"));
});