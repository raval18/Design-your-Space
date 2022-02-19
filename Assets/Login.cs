using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class Login : MonoBehaviour
{
    public InputField UsernameInput;
    public InputField PasswordInput;
    public Button LoginButton; 
    public Button CreateUser; 
    public Button forgetpassword; 
    public GameObject RegisterPanel;
    public GameObject LoginPanel;
    public GameObject forgetPanel;
    public GameObject DashboardPanel;
    public GameObject BackgroundPanel;
    public Text outputText;

    // Start is called before the first frame update
    void Start()
    {
        LoginButton.onClick.AddListener(() => {
            IEnumerator Login(string username, string password)
            {
                WWWForm form = new WWWForm();
                form.AddField("loginUser", username);
                form.AddField("loginPass", password);

                using (UnityWebRequest www = UnityWebRequest.Post("http://localhost/furnituregame/login.php", form))
                {
                    yield return www.SendWebRequest();

                    if (www.result != UnityWebRequest.Result.Success)
                    {
                        Debug.Log(www.error);
                    }
                    else
                    {
                        outputText.text = www.downloadHandler.text;
                        Debug.Log(www.downloadHandler.text);
                        if(outputText.text == "Login Success"){
                            DashboardPanel.SetActive(true);
                            BackgroundPanel.SetActive(false);
                        }
                    }
                }
            }
            StartCoroutine(Login(UsernameInput.text, PasswordInput.text));
            // StartCoroutine(Main.Instance.Web.Login(UsernameInput.text, PasswordInput.text,outputText.text));
            // outputText.text = "Login Successfull";
        });
        CreateUser.onClick.AddListener(() => {
            RegisterPanel.SetActive(true);
            forgetPanel.SetActive(false);
            LoginPanel.SetActive(false);
        });
        forgetpassword.onClick.AddListener(() => {
            RegisterPanel.SetActive(false);
            LoginPanel.SetActive(false);
            forgetPanel.SetActive(true);
        });
    }


 
}
