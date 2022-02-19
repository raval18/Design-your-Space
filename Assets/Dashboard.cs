using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;

public class Dashboard : MonoBehaviour
{
    public Text coins;
    public Button Logout; 
    public GameObject DashboardPanel;
    public GameObject BackgroundPanel;
    // Start is called before the first frame update
    void Start()
    {
        IEnumerator Dashboard()
            {
                WWWForm form = new WWWForm();
        
                using (UnityWebRequest www = UnityWebRequest.Post("http://localhost/furnituregame/getCoins.php", form))
                {
                    yield return www.SendWebRequest();
        
                    if (www.result != UnityWebRequest.Result.Success)
                    {
                        Debug.Log(www.error);
                    }
                    else
                    {
                        Debug.Log(www.downloadHandler.text);
                        coins.text = www.downloadHandler.text;
                        // outputText.text = www.downloadHandler.text;
                        // textDisplay = www.downloadHandler.text;
                    }
                }
            }
            StartCoroutine(Dashboard());
            Logout.onClick.AddListener(() => {
                IEnumerator Logout()
                {
                    WWWForm form = new WWWForm();

                    using (UnityWebRequest www = UnityWebRequest.Post("http://localhost/furnituregame/logout.php", form))
                    {
                        yield return www.SendWebRequest();

                        if (www.result != UnityWebRequest.Result.Success)
                        {
                            Debug.Log(www.error);
                        }
                        else
                        {
                            Debug.Log(www.downloadHandler.text);
                            DashboardPanel.SetActive(false);
                            BackgroundPanel.SetActive(true);
                            // outputText.text = www.downloadHandler.text;
                            // textDisplay = www.downloadHandler.text;
                        }
                    }
                }
            StartCoroutine(Logout());
            });
    }

    // Update is called once per frame
    void Update()
    {
        
    }
}
