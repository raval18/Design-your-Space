using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class forgetPassword : MonoBehaviour
{
    public InputField UsernameInput;
    public InputField PasswordInput;
    public Button fpButton; 

    // Start is called before the first frame update
    void Start()
    {
        fpButton.onClick.AddListener(() => {
            StartCoroutine(Main.Instance.Web.ForgetPassword(UsernameInput.text, PasswordInput.text));
        });
        
    }
}