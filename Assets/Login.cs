using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class Login : MonoBehaviour
{
    public InputField UsernameInput;
    public InputField PasswordInput;
    public Button LoginButton; 
    public Button CreateUser; 
    public GameObject RegisterPanel;
    public GameObject LoginPanel;

    // Start is called before the first frame update
    void Start()
    {
        LoginButton.onClick.AddListener(() => {
            StartCoroutine(Main.Instance.Web.Login(UsernameInput.text, PasswordInput.text));
        });
        CreateUser.onClick.AddListener(() => {
            RegisterPanel.SetActive(true);
            LoginPanel.SetActive(false);
        });
    }

 
}
