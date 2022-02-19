using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class forgetPassword : MonoBehaviour
{
    public InputField UsernameInput;
    public InputField PasswordInput;
    public GameObject LoginPanel;
    public GameObject fpPanel;
    public Button LoginButton; 
    public Button fpButton; 

    // Start is called before the first frame update
    void Start()
    {
        fpButton.onClick.AddListener(() => {
            StartCoroutine(Main.Instance.Web.ForgetPassword(UsernameInput.text, PasswordInput.text));
        });
        LoginButton.onClick.AddListener(() => {
            fpPanel.SetActive(false);
            LoginPanel.SetActive(true);
        });
        
    }
}