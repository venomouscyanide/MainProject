
		if (typeof web3 !== 'undefined') {
            web3 = new Web3(web3.currentProvider);
        } else {
            // set the provider you want from Web3.providers
            web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
        }

		web3.eth.defaultAccount = web3.eth.accounts[0];
		var registerUser = web3.eth.contract([
	{
		"constant": true,
		"inputs": [
			{
				"name": "electronicmail",
				"type": "string"
			}
		],
		"name": "getUserByEmail",
		"outputs": [
			{
				"name": "id",
				"type": "uint256"
			},
			{
				"name": "name",
				"type": "string"
			},
			{
				"name": "email",
				"type": "string"
			},
			{
				"name": "password",
				"type": "string"
			},
			{
				"name": "age",
				"type": "uint256"
			},
			{
				"name": "add",
				"type": "string"
			},
			{
				"name": "mobile",
				"type": "uint256"
			},
			{
				"name": "status",
				"type": "uint256"
			},
			{
				"name": "message",
				"type": "string"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getCount",
		"outputs": [
			{
				"name": "counter",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "count",
		"outputs": [
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "id",
				"type": "uint256"
			},
			{
				"name": "name",
				"type": "string"
			},
			{
				"name": "email",
				"type": "string"
			},
			{
				"name": "password",
				"type": "string"
			},
			{
				"name": "age",
				"type": "uint256"
			},
			{
				"name": "add",
				"type": "string"
			},
			{
				"name": "mobile",
				"type": "uint256"
			},
			{
				"name": "status",
				"type": "uint256"
			},
			{
				"name": "message",
				"type": "string"
			}
		],
		"name": "registerUser",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	}
]);       
	var register = registerUser.at('0x84a9c13528935d3a3ca15c5f63899925299d6b6a');
	console.log(register);
	
	var exists=register.getUserByEmail($("#email").val());
	
